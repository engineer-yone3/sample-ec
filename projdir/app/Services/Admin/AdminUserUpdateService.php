<?php

namespace App\Services\Admin;

use App\Repositories\Admin\IAdminUserUpdateRepository;
use App\Services\Admin\IAdminUserUpdateService;

class AdminUserUpdateService implements IAdminUserUpdateService
{
    public function __construct(
        private readonly IAdminUserUpdateRepository $adminUserUpdateRepository
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function register(array $params): void
    {
        $this->adminUserUpdateRepository->userCreate($params);
    }

    /**
     * @inheritDoc
     */
    public function update(array $params): void
    {
        $this->adminUserUpdateRepository->userUpdate($params);
    }
}
