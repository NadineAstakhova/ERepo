<?php

namespace Src\Domain\Contracts;

interface TeamCounterServiceInterface
{
    public function getTotalSteps(int $teamId);
    public function getEmployeesInTeamWithSteps(int $teamId, int $per_page, int $page);
    public function getAllTeamsWithCounters(int $per_page = 20, int $page = 1);
}
