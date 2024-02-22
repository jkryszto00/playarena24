<?php

namespace App\Repositories\WriteRepository;

use App\DataTransferObjects\SeasonDto;
use App\Models\Season;

class SeasonWriteRepository
{
    public function store(SeasonDto $seasonDto): Season
    {
        return Season::create($seasonDto->toArray());
    }

    public function update(Season $season, SeasonDto $seasonDto): Season
    {
        $season->update($seasonDto->toArray());

        return $season;
    }

    public function delete(Season $season): bool
    {
        return $season->delete();
    }
}
