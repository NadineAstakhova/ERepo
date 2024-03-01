<?php

namespace Src\Infrastructure\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Src\Domain\Repositories\TeamCounterRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

class TeamCounterRepository implements TeamCounterRepositoryInterface
{

    public function getTotalSteps(int $teamId)
    {
        //I use a query builder for optimization. via eloquent here will be slower
       return DB::table('counters')
            ->where('team_id', $teamId)
            ->sum('sum_value');
    }

    public function getEmployeesWithCounterFromTeam(int $teamId, int $per_page = 20, int $page = 1): LengthAwarePaginator
    {
        return EmployeeEloquentModel::with('counters:id,name')->where('team_id', $teamId)->paginate($per_page, ['*'], 'employeesWithSteps', $page);
    }
}