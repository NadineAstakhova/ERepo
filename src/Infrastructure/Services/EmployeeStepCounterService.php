<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\EmployeeStepCounterServiceInterface;
use Src\Domain\Repositories\EmployeeCounterRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;
use Src\Infrastructure\Mappers\EmployeeStepMapper;

class EmployeeStepCounterService implements EmployeeStepCounterServiceInterface
{
    public function __construct(
        private readonly EmployeeCounterRepositoryInterface $employeeCounterRepositoryInterface

    ) {}

    public function incrementEmployeeStepCounter(EmployeeEloquentModel $employee, CounterEloquentModel $counter): array
    {
       $stepCounter = $this->employeeCounterRepositoryInterface->increment($employee, $counter);
       return EmployeeStepMapper::toArray($stepCounter, $employee, $counter);
    }
}
