<?php

namespace App\Repositories\WriteRepository;

use App\DataTransferObjects\TeamDto;
use App\Models\Team;

class TeamWriteRepository
{
    public function store(TeamDto $teamDto): Team
    {
        return Team::create($teamDto->toArray());
    }

    public function update(Team $team, TeamDto $teamDto): Team
    {
        $team->update($teamDto->toArray());

        return $team;
    }

    public function delete(Team $team): bool
    {
        return $team->delete();
    }
}
