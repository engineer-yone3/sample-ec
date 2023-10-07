<?php

namespace App\Repositories\Admin;

use Exception;

interface IAdminUserUpdateRepository
{
    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function userCreate(array $params): void;

    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function userUpdate(array $params): void;
}
