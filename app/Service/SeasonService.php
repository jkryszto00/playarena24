<?php

namespace App\Service;

use App\DataTransferObjects\SeasonDto;
use App\Models\Season;
use App\Repositories\ReadRepository\SeasonReadRepository;
use App\Repositories\WriteRepository\SeasonWriteRepository;

class SeasonService
{
    public function __construct(
        protected SeasonReadRepository $readRepository,
        protected SeasonWriteRepository $writeRepository
    ){}

    public function create(SeasonDto $seasonDto): Season
    {
        return $this->writeRepository->store($seasonDto);
    }

    public function update(Season $season, SeasonDto $seasonDto): Season
    {
        return $this->writeRepository->update($season, $seasonDto);
    }

    public function delete(Season $season): void
    {
        $this->writeRepository->delete($season);
    }
}
