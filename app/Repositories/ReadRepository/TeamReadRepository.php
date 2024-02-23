<?php

namespace App\Repositories\ReadRepository;

use App\Models\Team;
use Illuminate\Database\Eloquent\Collection;

class TeamReadRepository
{
    public function getAll(): Collection
    {
        return Team::all();
    }

    public function findById(int $id): ?Team
    {
        return Team::find($id);
    }
}
