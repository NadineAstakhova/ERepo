<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\Employee;

interface EmployeeRepositoryInterface
{
    public function store(Employee $employee);

    public function delete(Employee $employee);

    public function findById(int $id): Employee;
}
