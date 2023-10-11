<?php

namespace App\Services\Admin;

use App\Models\Genre;
use App\Repositories\Admin\IItemGenreIndexRepository;
use App\Services\Admin\IItemGenreIndexService;

class ItemGenreIndexService implements IItemGenreIndexService
{

    public function __construct(
        private readonly IItemGenreIndexRepository $itemGenreIndexRepository
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function search(string $name): array
    {
        $result = $this->itemGenreIndexRepository->search($name);

        return $result->isEmpty() ? [] : $result->toArray();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Genre
    {
        return $this->itemGenreIndexRepository->find($id);
    }
}
