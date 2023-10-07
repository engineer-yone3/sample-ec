<?php

namespace App\Services\Admin;

use Exception;

interface IAdminUserUpdateService
{
    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function register(array $params): void;

    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function update(array $params): void;
}
