<?php

namespace App\Services\Admin;

use App\Models\AdminUser;

interface IAdminUserIndexService
{
    /**
     * @param array $condition
     * @return array
     */
    public function search(array $condition): array;

    /**
     * @param int $id
     * @return AdminUser|null
     */
    public function find(int $id): ?AdminUser;
}
