<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\EmployeeCounter;

interface EmployeeCounterRepositoryInterface
{
    public function store(EmployeeCounter $employeeCounter);

    public function delete(EmployeeCounter $employeeCounter);

    public function findById(int $id): EmployeeCounter;

    public function increment(EmployeeCounter $employeeCounter);
}
