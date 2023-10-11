<?php

namespace App\Services\Admin;

use App\Models\Genre;

interface IItemGenreIndexService
{

    /**
     * @param string $name
     * @return array
     */
    public function search(string $name): array;

    /**
     * @param int $id
     * @return Genre|null
     */
    public function find(int $id): ?Genre;
}
