<?php

namespace App\Repositories\Admin;

use Illuminate\Database\Eloquent\Collection;

interface IAdminUserIndexRepository
{
    /**
     * @param array $condition
     * @return Collection
     */
    public function search(array $condition): Collection;
}
