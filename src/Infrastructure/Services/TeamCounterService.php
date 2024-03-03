<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\TeamCounterServiceInterface;
use Src\Domain\Repositories\TeamCounterRepositoryInterface;

class TeamCounterService implements TeamCounterServiceInterface
{
    public function __construct(
        private readonly TeamCounterRepositoryInterface $teamCounterRepository

    ) {}

    public function getTotalSteps(int $teamId): int
    {
        return $this->teamCounterRepository->getTotalSteps($teamId);
    }

    public function getEmployeesInTeamWithSteps(int $teamId, int $per_page = 20, int $page = 1)
    {
        return $this->teamCounterRepository->getEmployeesWithCounterFromTeam($teamId, $per_page, $page);
    }

    public function getAllTeamsWithCounters(int $per_page = 20, int $page = 1)
    {
        return $this->teamCounterRepository->getAllTeamsWithCounters($per_page, $page);
    }
}
