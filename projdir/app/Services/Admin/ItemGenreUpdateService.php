<?php

namespace App\Services\Admin;

use App\Repositories\Admin\IItemGenreUpdateRepository;

class ItemGenreUpdateService implements IItemGenreUpdateService
{

    public function __construct(
        private readonly IItemGenreUpdateRepository $itemGenreUpdateRepository
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function create(string $name): int
    {
        return $this->itemGenreUpdateRepository->create($name);
    }

    /**
     * @inheritDoc
     */
    public function update(array $params): void
    {
        $this->itemGenreUpdateRepository->update($params);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): void
    {
        $this->itemGenreUpdateRepository->delete($id);
    }
}
