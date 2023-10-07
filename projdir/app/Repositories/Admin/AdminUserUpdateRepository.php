<?php

namespace App\Repositories\Admin;

use App\Models\AdminUser;
use App\Repositories\Admin\IAdminUserUpdateRepository;
use Illuminate\Support\Facades\Hash;

class AdminUserUpdateRepository implements IAdminUserUpdateRepository
{

    /**
     * @inheritDoc
     */
    public function userCreate(array $params): void
    {
        try {
            AdminUser::create([
                'name' => $params['name'],
                'email' => $params['email'],
                'password' => Hash::make($params['password']),
                'is_publish' => $params['is_publish'],
            ]);
        } catch (\Throwable $th) {
            logger()->error('【' . __CLASS__ . '】' . '【' . __METHOD__ . '】' . 'DBへの登録処理でエラーが発生しました');
            throw $th;
        }
    }

    /**
     * @inheritDoc
     */
    public function userUpdate(array $params): void
    {
        try {
            $user = AdminUser::find($params['user_id']);

            $user->name = $params['name'];
            $user->email = $params['email'];
            $user->is_publish = $params['is_publish'];

            if (!empty($params['password'])) {
                $user->password = Hash::make($params['password']);
            }

            $user->save();
        } catch (\Throwable $th) {
            logger()->error('【' . __CLASS__ . '】' . '【' . __METHOD__ . '】' . 'DBへの更新処理でエラーが発生しました');
            throw $th;
        }
    }
}
