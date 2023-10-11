<?php

namespace App\Repositories\Admin;

use Exception;

interface IAdminUserUpdateRepository
{
    /**
     * @param array $params
     * @return int
     * @throws Exception
     */
    public function userCreate(array $params): int;

    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function userUpdate(array $params): void;

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function userDelete(int $id): void;
}
