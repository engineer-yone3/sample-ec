<?php

namespace App\Repositories\Admin;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;

interface IItemGenreIndexRepository
{
    /**
     * @param string $name
     * @return Collection
     */
    public function search(string $name): Collection;

    /**
     * @param int $id
     * @return Genre|null
     */
    public function find(int $id): ?Genre;
}
