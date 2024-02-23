<?php

namespace App\Service;

use App\DataTransferObjects\TeamDto;
use App\Models\Team;
use App\Repositories\ReadRepository\TeamReadRepository;
use App\Repositories\WriteRepository\TeamWriteRepository;

class TeamService
{
    public function __construct(
        protected TeamReadRepository $readRepository,
        protected TeamWriteRepository $writeRepository
    ){}

    public function create(TeamDto $teamDto): Team
    {
        return $this->writeRepository->store($teamDto);
    }

    public function update(Team $team, TeamDto $teamDto): Team
    {
        return $this->writeRepository->update($team, $teamDto);
    }

    public function delete(Team $team): void
    {
        $this->writeRepository->delete($team);
    }
}
