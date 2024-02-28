<?php

namespace Src\Domain\Contracts;

use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

interface EmployeeStepCounterServiceInterface
{
    public function incrementEmployeeStepCounter(EmployeeEloquentModel $employee, CounterEloquentModel $counter): array;

}
