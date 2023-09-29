<?php

namespace App\Services\Admin;

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
}
