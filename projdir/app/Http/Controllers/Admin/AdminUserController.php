<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminUserDeleteRequest;
use App\Http\Requests\Admin\AdminUserIdRequest;
use App\Http\Requests\Admin\AdminUserIndexRequest;
use App\Http\Requests\Admin\AdminUserUpdateRequest;
use App\Services\Admin\IAdminUserIndexService;
use App\Services\Admin\IAdminUserUpdateService;
use Illuminate\Contracts\View\View;

class AdminUserController extends AdminControllerBase
{

    public function __construct(
        private readonly IAdminUserIndexService  $adminUserIndexService,
        private readonly IAdminUserUpdateService $adminUserUpdateService,
        protected string                         $htmlTitle = 'Admin画面 アカウント管理',
        protected string                         $headerTitle = 'アカウント管理',
    )
    {
    }

    /**
     * @param AdminUserIndexRequest $request
     * @return View
     */
    public function index(AdminUserIndexRequest $request): View
    {
        $condition = $this->createSearchCondition($request);
        $members = $this->adminUserIndexService->search($condition);
        $this->subTitle = 'アカウント一覧';
        return $this->adminView('adminuser.index',
            [
                'data' => [
                    'users' => $members,
                    'search_email' => $condition['search_email'] ?? '',
                    'search_name' => $condition['search_name'] ?? ''
                ],
            ]
        );
    }

    /**
     * @param AdminUserIndexRequest $request
     * @return array
     */
    private function createSearchCondition(AdminUserIndexRequest $request): array
    {
        $condition = [];

        if (!empty($request->search_email)) {
            $condition['search_email'] = $request->search_email;
        }

        if (!empty($request->search_name)) {
            $condition['search_name'] = $request->search_name;
        }

        return $condition;
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $this->subTitle = 'アカウント新規作成';
        return $this->adminView('adminuser.edit');
    }

    /**
     * @param AdminUserUpdateRequest $request
     * @return View
     */
    public function update(AdminUserUpdateRequest $request): View
    {
        $validated = $request->validated();
        $id = empty($validated['user_id']) ? 0 : $validated['user_id'];

        try {
            if (empty($validated['user_id'])) {
                $this->subTitle = 'アカウント新規作成';
                // 新規作成
                $id = $this->adminUserUpdateService->register($validated);
            } else {
                $this->subTitle = 'アカウント編集';
                // 更新
                $this->adminUserUpdateService->update($validated);
            }

            $this->addInfo('処理が完了しました');
        } catch (\Throwable $th) {
            logger()->error('管理ユーザー登録／更新処理でエラー発生');
            logger()->error($th->getTraceAsString());
            $this->addError('不明なエラーが発生しました');
        }

        $updatedUser = $this->adminUserIndexService->find($id);

        return $this->adminView('adminuser.edit', [
            'data' => [
                'id' => $updatedUser->id,
                'email' => $updatedUser->email,
                'name' => $updatedUser->name,
                'is_publish' => $updatedUser->is_publish
            ]
        ]);
    }

    /**
     * @param AdminUserIdRequest $request
     * @return View
     */
    public function edit(AdminUserIdRequest $request): View
    {
        $id = $request->id;
        $user = $this->adminUserIndexService->find($id);
        $this->subTitle = 'アカウント編集';

        if (empty($user)) {
            $this->addError('対象のデータは存在しません');
        }

        return $this->adminView('adminuser.edit', [
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'is_publish' => $user->is_publish
            ],
        ]);
    }

    /**
     * @param AdminUserDeleteRequest $request
     * @return View
     */
    public function delete(AdminUserDeleteRequest $request): View
    {
        $id = $request->id;
        $this->subTitle = 'アカウント一覧';

        try {
            $this->adminUserUpdateService->delete($id);
        } catch (\Throwable $th) {
            logger()->error('管理ユーザー削除処理でエラー発生');
            logger()->error($th->getTraceAsString());
            $this->addError('不明なエラーが発生しました');
        }

        $members = $this->adminUserIndexService->search([]);
        return $this->adminView('adminuser.index',
            [
                'data' => [
                    'users' => $members,
                    'search_email' => '',
                    'search_name' => ''
                ],
            ]
        );
    }
}
