<?php

namespace Src\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Src\Domain\Models\EmployeeCounter;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Domain\Repositories\EmployeeCounterRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeCounterEloquentPivotModel;
use Src\Infrastructure\Database\EloquentModels\EmployeeEloquentModel;

class EmployeeCounterRepository implements EmployeeCounterRepositoryInterface
{

    public function __construct(
        private readonly CounterRepositoryInterface $counterRepository

    ) {}

    public function store(EmployeeCounter $employeeCounter)
    {
        // TODO: Implement store() method.
    }

    public function delete(EmployeeCounter $employeeCounter)
    {
        // TODO: Implement delete() method.
    }

    public function findById(int $id): EmployeeCounter
    {
        // TODO: Implement findById() method.
    }

    public function findByEmployeeIdAndCounterId(int $employeeId, int $counterId): EmployeeCounterEloquentPivotModel|null
    {
        return EmployeeCounterEloquentPivotModel::where('employee_id', $employeeId)->where('counter_id', $counterId)->first();
    }

    public function increment(EmployeeEloquentModel $employee, CounterEloquentModel $counter): EmployeeCounterEloquentPivotModel
    {
       $stepCounter = $this->findByEmployeeIdAndCounterId($employee->id, $counter->id);
       $this->transactionIncrement($employee, $counter, $stepCounter);

       return $stepCounter?->refresh() ?? $this->findByEmployeeIdAndCounterId($employee->id, $counter->id);

    }

    public function transactionIncrement(EmployeeEloquentModel $employee, CounterEloquentModel $counter, $stepCounter = null): void
    {
        try {
            DB::beginTransaction(); // <= Starting the transaction

            if(is_null($stepCounter)){
                $employee->counters()->syncWithPivotValues([$counter->id], ['steps_value' => 1]);
            }
            else{
                $this->incrementQuery($stepCounter->id);
            }

            $this->counterRepository->increment($counter->id);

            DB::commit(); // <= Commit the changes
        } catch (\Exception $e) {
            report($e);

           DB::rollBack(); // <= Rollback in case of an exception
        }
    }

    private function incrementQuery(int $stepCounterId): void
    {
        DB::table('employee_counter')
            ->where('id', $stepCounterId)
            ->increment('steps_value');
    }
}
