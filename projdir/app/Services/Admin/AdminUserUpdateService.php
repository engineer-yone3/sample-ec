<?php

namespace App\Services\Admin;

use App\Repositories\Admin\IAdminUserUpdateRepository;

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
    public function register(array $params): int
    {
        return $this->adminUserUpdateRepository->userCreate($params);
    }

    /**
     * @inheritDoc
     */
    public function update(array $params): void
    {
        $this->adminUserUpdateRepository->userUpdate($params);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        $this->adminUserUpdateRepository->userDelete($id);
    }
}
