<?php

namespace App\Services\Admin;

use App\Models\AdminUser;
use App\Repositories\Admin\IAdminUserIndexRepository;

class AdminUserIndexService implements IAdminUserIndexService
{

    public function __construct(
        private readonly IAdminUserIndexRepository $adminUserIndexRepository
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function search(array $condition): array
    {
        $result = $this->adminUserIndexRepository->search($condition);

        if ($result->isEmpty()) {
            return [];
        }

        return $result->toArray();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?AdminUser
    {
        return $this->adminUserIndexRepository->find($id);
    }
}
