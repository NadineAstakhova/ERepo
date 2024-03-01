<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\TeamCounterServiceInterface;
use Src\Domain\Repositories\TeamCounterRepositoryInterface;

class TeamCounterService implements TeamCounterServiceInterface
{
    public function __construct(
        private readonly TeamCounterRepositoryInterface $teamCounterRepository

    ) {}

    public function getTotalSteps(int $teamId)
    {
        return $this->teamCounterRepository->getTotalSteps($teamId);
    }

    public function getEmployeesInTeamWithSteps(int $teamId, int $per_page, int $page)
    {
        return $this->teamCounterRepository->getEmployeesWithCounterFromTeam($teamId, $per_page, $page);
    }
}
