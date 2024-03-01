<?php

namespace Src\Domain\Repositories;

interface TeamCounterRepositoryInterface
{
    public function getTotalSteps(int $teamId);

    public function getEmployeesWithCounterFromTeam(int $teamId, int $per_page = 20, int $page = 1);

    public function getAllTeamsWithCounters(int $per_page = 20, int $page = 1);
}
