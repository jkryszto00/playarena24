<?php

namespace App\Repositories\WriteRepository;

use App\DataTransferObjects\CompetitionDto;
use App\Models\Competition;

class CompetitionWriteRepository
{
    public function store(CompetitionDto $competitionDto): Competition
    {
        return Competition::create($competitionDto->toArray());
    }

    public function update(Competition $competition, CompetitionDto $competitionDto): Competition
    {
        $competition->update($competitionDto->toArray());

        return $competition;
    }

    public function delete(Competition $competition): bool
    {
        return $competition->delete();
    }
}
