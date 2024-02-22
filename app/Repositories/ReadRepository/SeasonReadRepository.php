<?php

namespace App\Repositories\ReadRepository;

use App\Models\Season;
use Illuminate\Database\Eloquent\Collection;

class SeasonReadRepository
{
    public function getAll(): Collection
    {
        return Season::all();
    }

    public function findById(int $id): ?Season
    {
        return Season::find($id);
    }
}
