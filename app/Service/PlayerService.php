<?php

namespace App\Service;


use App\DataTransferObjects\PlayerDto;
use App\Models\Player;
use App\Repositories\ReadRepository\PlayerReadRepository;
use App\Repositories\WriteRepository\PlayerWriteRepository;

class PlayerService
{
    public function __construct(
        protected PlayerReadRepository $readRepository,
        protected PlayerWriteRepository $writeRepository
    ){}

    public function create(PlayerDto $playerDto): Player
    {
        return $this->writeRepository->store($playerDto);
    }

    public function update(Player $player, PlayerDto $playerDto): Player
    {
        return $this->writeRepository->update($player, $playerDto);
    }

    public function delete(Player $player): void
    {
        $this->writeRepository->delete($player);
    }
}
