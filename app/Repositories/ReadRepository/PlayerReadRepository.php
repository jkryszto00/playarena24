<?php

namespace App\Repositories\ReadRepository;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;

class PlayerReadRepository
{
    public function getAll(): Collection
    {
        return Player::all();
    }

    public function findById(int $id): ?Player
    {
        return Player::find($id);
    }
}
