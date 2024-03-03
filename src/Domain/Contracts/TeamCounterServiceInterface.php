<?php

namespace Src\Domain\Contracts;

interface TeamCounterServiceInterface
{
    /**
     * Get the summary of all counters in a team
     * @param int $teamId
     * @return int
     */
    public function getTotalSteps(int $teamId): int;

    /**
     * Get a list of teams employees with counters and steps count for an employee. Use pagination
     * @param int $teamId
     * @param int $per_page
     * @param int $page
     * @return mixed
     */
    public function getEmployeesInTeamWithSteps(int $teamId, int $per_page, int $page);

    /**
     * Get a list of all team with their counters and the summary of steps. Use pagination
     * @param int $per_page
     * @param int $page
     * @return mixed
     */
    public function getAllTeamsWithCounters(int $per_page = 20, int $page = 1);
}
