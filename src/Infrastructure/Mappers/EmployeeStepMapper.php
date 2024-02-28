<?php

namespace Src\Infrastructure\Mappers;

use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeCounterEloquentPivotModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

class EmployeeStepMapper
{
    public static function toArray(EmployeeCounterEloquentPivotModel $steps, EmployeeEloquentModel $employeeEM, CounterEloquentModel $counterEM): array
    {
        return [
            "employee" => $employeeEM->name . ' ' . $employeeEM->surname, //todo to scope,
            "counter" => $counterEM->name,
            "steps" => $steps->steps_value
        ];
    }
}
