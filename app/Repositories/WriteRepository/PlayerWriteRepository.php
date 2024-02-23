<?php

namespace App\Repositories\WriteRepository;

use App\DataTransferObjects\PlayerDto;
use App\Models\Player;

class PlayerWriteRepository
{
    public function store(PlayerDto $playerDto): Player
    {
        return Player::create($playerDto->toArray());
    }

    public function update(Player $player, PlayerDto $playerDto): Player
    {
        $player->update($playerDto->toArray());

        return $player;
    }

    public function delete(Player $player): bool
    {
        return $player->delete();
    }
}
