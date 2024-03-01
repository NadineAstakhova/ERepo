<?php

namespace Src\Domain\Contracts;

interface TeamCounterServiceInterface
{
    public function getTotalSteps(int $teamId);
    public function getEmployeesInTeamWithSteps(int $teamId, int $per_page, int $page);

}
