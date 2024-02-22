<?php

namespace App\Service;

use App\DataTransferObjects\CompetitionDto;
use App\Models\Competition;
use App\Repositories\ReadRepository\CompetitionReadRepository;
use App\Repositories\WriteRepository\CompetitionWriteRepository;

class CompetitionService
{
    public function __construct(
        protected CompetitionReadRepository $readRepository,
        protected CompetitionWriteRepository $writeRepository
    ){}

    public function create(CompetitionDto $competitionDto): Competition
    {
        return $this->writeRepository->store($competitionDto);
    }

    public function update(Competition $competition, CompetitionDto $competitionDto): Competition
    {
        return $this->writeRepository->update($competition, $competitionDto);
    }

    public function delete(Competition $competition): void
    {
        $this->writeRepository->delete($competition);
    }
}
