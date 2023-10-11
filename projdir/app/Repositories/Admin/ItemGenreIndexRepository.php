<?php

namespace App\Repositories\Admin;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;

class ItemGenreIndexRepository implements IItemGenreIndexRepository
{

    /**
     * @inheritDoc
     */
    public function search(string $name): Collection
    {
        $query = Genre::query();

        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        return $query->get();
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Genre
    {
        return Genre::find($id);
    }
}
