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

    /**
     * Thread safe operation for incrementing counter for an employee. Safe for parallel users
     * @param EmployeeEloquentModel $employee
     * @param CounterEloquentModel $counter
     * @return mixed
     */
    public function increment(EmployeeEloquentModel $employee, CounterEloquentModel $counter);
}
