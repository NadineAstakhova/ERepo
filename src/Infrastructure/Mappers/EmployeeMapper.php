<?php

namespace Src\Infrastructure\Mappers;

use Src\Domain\Models\Employee;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

class EmployeeMapper
{
    public static function toEloquent(Employee $employee): EmployeeEloquentModel
    {
        $employeeEM = new EmployeeEloquentModel();
        if ($employee->id) {
            $employeeEM = EmployeeEloquentModel::query()->findOrFail($employee->id);
        }
        $employeeEM->name = $employee->name;
        $employeeEM->surname = $employee->surname;
        $employeeEM->team_id = $employee->teamId;
        return $employeeEM;
    }
}
