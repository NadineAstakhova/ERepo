<?php

namespace Src\Domain\Contracts;

interface CounterServiceInterface
{
    public function addCounterToTeam(array $data);

    public function removeCounterFromTeam(int $counterId);
}
