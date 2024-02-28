<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\EmployeeStepCounterServiceInterface;
use Src\Domain\Models\Counter;
use Src\Domain\Models\Employee;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;
use Src\Infrastructure\Mappers\CounterMapper;
use Src\Infrastructure\Mappers\EmployeeMapper;
use Src\Infrastructure\Mappers\EmployeeStepMapper;
use Src\Infrastructure\Repositories\EmployeeCounterRepository;

class EmployeeStepCounterService implements EmployeeStepCounterServiceInterface
{
    public function __construct(
        private readonly EmployeeCounterRepository $employeeCounterRepository

    ) {}

    public function incrementEmployeeStepCounter(EmployeeEloquentModel $employee, CounterEloquentModel $counter): array
    {
       $stepCounter = $this->employeeCounterRepository->increment($employee, $counter);
       return EmployeeStepMapper::toArray($stepCounter, $employee, $counter);
    }
}
