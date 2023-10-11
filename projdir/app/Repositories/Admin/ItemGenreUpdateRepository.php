<?php

namespace App\Repositories\Admin;

use App\Models\Genre;

class ItemGenreUpdateRepository implements IItemGenreUpdateRepository
{

    /**
     * @inheritDoc
     */
    public function create(string $name): int
    {
        try {
            $result = Genre::create([
                'name' => $name,
            ]);
            return $result->id;
        } catch (\Throwable $th) {
            logger()->error('【' . __CLASS__ . '】' . '【' . __METHOD__ . '】' . 'DBへの登録処理でエラーが発生しました');
            throw $th;
        }
    }

    /**
     * @inheritDoc
     */
    public function update(array $params): void
    {
        try {
            $user = Genre::find($params['genre_id']);
            $user->name = $params['name'];
            $user->save();
        } catch (\Throwable $th) {
            logger()->error('【' . __CLASS__ . '】' . '【' . __METHOD__ . '】' . 'DBへの更新処理でエラーが発生しました');
            throw $th;
        }
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        try {
            $user = Genre::find($id);

            $user->delete();
        } catch (\Throwable $th) {
            logger()->error('【' . __CLASS__ . '】' . '【' . __METHOD__ . '】' . 'DBへの更新処理でエラーが発生しました');
        }
    }
}
