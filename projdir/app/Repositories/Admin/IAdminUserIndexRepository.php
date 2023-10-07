<?php

namespace App\Repositories\Admin;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;

interface IAdminUserIndexRepository
{
    /**
     * @param array $condition
     * @return Collection
     */
    public function search(array $condition): Collection;

    /**
     * @param int $id
     * @return AdminUser|null
     */
    public function find(int $id): ?AdminUser;
}
