<?php

namespace App\Repositories\ReadRepository;

use App\Models\Competition;
use Illuminate\Database\Eloquent\Collection;

class CompetitionReadRepository
{
    public function getAll(): Collection
    {
        return Competition::all();
    }

    public function findById(int $id): ?Competition
    {
        return Competition::find($id);
    }
}
