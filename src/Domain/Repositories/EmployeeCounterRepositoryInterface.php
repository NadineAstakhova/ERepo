<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\EmployeeCounter;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

interface EmployeeCounterRepositoryInterface
{
    public function store(EmployeeCounter $employeeCounter);

    public function delete(EmployeeCounter $employeeCounter);

    public function findById(int $id): EmployeeCounter;

    public function increment(EmployeeEloquentModel $employee, CounterEloquentModel $counter);
}
