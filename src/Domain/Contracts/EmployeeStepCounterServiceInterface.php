<?php

namespace Src\Domain\Contracts;

use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

interface EmployeeStepCounterServiceInterface
{
    /**
     * Increment a step counter for an employee at the infrastructure layer. Safe for parallel users
     * @param EmployeeEloquentModel $employee
     * @param CounterEloquentModel $counter
     * @return array
     */
    public function incrementEmployeeStepCounter(EmployeeEloquentModel $employee, CounterEloquentModel $counter): array;

}
