<?php

namespace App\Repositories\Admin;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;

class AdminUserIndexRepository implements IAdminUserIndexRepository
{

    /**
     * @inheritDoc
     */
    public function search(array $condition): Collection
    {
        $query = AdminUser::query();

        if (isset($condition['search_email'])) {
            $query->where('email', 'like', '%' . $condition['search_email'] . '%');
        }

        if (isset($condition['search_name'])) {
            $query->where('name', 'like', '%' . $condition['search_name'] . '%');
        }

        return $query->get();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): AdminUser
    {
        return AdminUser::find($id);
    }
}
