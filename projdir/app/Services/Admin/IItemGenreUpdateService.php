<?php

namespace App\Services\Admin;

use Exception;

interface IItemGenreUpdateService
{
    /**
     * @param string $name
     * @return int
     * @throws Exception
     */
    public function create(string $name): int;

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