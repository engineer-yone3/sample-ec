<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ItemGenreDeleteRequest;
use App\Http\Requests\Admin\ItemGenreIdRequest;
use App\Http\Requests\Admin\ItemGenreIndexRequest;
use App\Http\Requests\Admin\ItemGenreUpdateRequest;
use App\Services\Admin\IItemGenreIndexService;
use App\Services\Admin\IItemGenreUpdateService;
use Illuminate\Contracts\View\View;

class ItemGenreController extends AdminControllerBase
{
    public function __construct(
        private readonly IItemGenreIndexService  $itemGenreIndexService,
        private readonly IItemGenreUpdateService $itemGenreUpdateService,
        protected string                         $htmlTitle = 'Admin画面 商品ジャンル管理',
        protected string                         $headerTitle = '商品ジャンル管理',
    )
    {
    }

    public function index(ItemGenreIndexRequest $request): View
    {
        $searchName = $request->search_name ?? '';

        $genres = $this->itemGenreIndexService->search($searchName);
        $this->subTitle = '商品ジャンル一覧';
        return $this->adminView('genre.index',
            [
                'data' => [
                    'genres' => $genres,
                    'search_name' => $searchName
                ],
            ]
        );
    }

    public function create()
    {
        $this->subTitle = '商品ジャンル新規作成';
        return $this->adminView('genre.edit');
    }

    public function edit(ItemGenreIdRequest $request): View
    {
        $id = $request->id;
        $user = $this->itemGenreIndexService->find($id);
        $this->subTitle = '商品ジャンル編集';

        if (empty($user)) {
            $this->addError('対象のデータは存在しません');
        }

        return $this->adminView('genre.edit', [
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
            ],
        ]);
    }

    public function update(ItemGenreUpdateRequest $request): View
    {
        $validated = $request->validated();
        $id = empty($validated['genre_id']) ? 0 : $validated['genre_id'];

        try {
            if (empty($validated['genre_id'])) {
                $this->subTitle = '商品ジャンル新規作成';
                // 新規作成
                $id = $this->itemGenreUpdateService->create($validated['name']);
            } else {
                $this->subTitle = '商品ジャンル編集';
                // 更新
                $this->itemGenreUpdateService->update($validated);
            }

            $this->addInfo('処理が完了しました');
        } catch (\Throwable $th) {
            logger()->error('商品ジャンル登録／更新処理でエラー発生');
            logger()->error($th->getTraceAsString());
            $this->addError('不明なエラーが発生しました');
        }

        $updatedGenre = $this->itemGenreIndexService->find($id);

        return $this->adminView('genre.edit', [
            'data' => [
                'id' => $updatedGenre->id,
                'name' => $updatedGenre->name,
            ]
        ]);
    }

    public function delete(ItemGenreDeleteRequest $request): View
    {
        $id = $request->id;
        $this->subTitle = '商品ジャンル一覧';

        try {
            $this->itemGenreUpdateService->delete($id);
        } catch (\Throwable $th) {
            logger()->error('商品ジャンル削除処理でエラー発生');
            logger()->error($th->getTraceAsString());
            $this->addError('不明なエラーが発生しました');
        }

        $genres = $this->itemGenreIndexService->search('');
        return $this->adminView('genre.index',
            [
                'data' => [
                    'genres' => $genres,
                    'search_name' => ''
                ],
            ]
        );
    }
}
