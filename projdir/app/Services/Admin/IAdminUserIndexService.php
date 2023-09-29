<?php

namespace App\Services\Admin;

interface IAdminUserIndexService
{
    /**
     * @param array $condition
     * @return array
     */
    public function search(array $condition): array;
}
