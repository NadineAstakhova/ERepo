<?php

namespace Src\Domain\Contracts;

interface CounterServiceInterface
{
    /**
     * Add a counter to a team via infrastructure layer
     * @param array $data
     * @return mixed
     */
    public function addCounterToTeam(array $data);

    /**
     * Remove an existed counter from a team. It also deletes step counters for employees in a team
     * @param int $counterId
     * @return mixed
     */
    public function removeCounterFromTeam(int $counterId);
}
