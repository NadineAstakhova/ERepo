<?php

namespace Src\Infrastructure\Database\EloquentModels;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeCounterEloquentPivotModel extends Pivot
{

    protected $table = "employee_counter";

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

}
