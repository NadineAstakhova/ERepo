<?php

namespace Src\Domain\Models;

class EmployeeCounter
{
    public function __construct(
        public readonly int $employeeId,
        public readonly int $teamId,
    ) {}

    //todo or maybe collections
    public function jsonSerialize(): array
    {
        return [
            'employeeId' => $this->employeeId,
            'teamId' => $this->teamId
        ];
    }
}
