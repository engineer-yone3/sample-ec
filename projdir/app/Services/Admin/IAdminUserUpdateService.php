<?php

namespace App\Services\Admin;

use Exception;

interface IAdminUserUpdateService
{
    /**
     * @param array $params
     * @return int
     * @throws Exception
     */
    public function register(array $params): int;

    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function update(array $params): void;

    /**
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delete(int $id): void;
}
