<?php

namespace Src\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Src\Domain\Models\Counter;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;
use Src\Infrastructure\Mappers\CounterMapper;

class CounterRepository implements CounterRepositoryInterface
{

    public function store(Counter $counter): void
    {
        $counterEM = CounterMapper::toEloquent($counter);
        $counterEM->save();
    }

    public function delete(Counter $counter): void
    {
        $counterEM = CounterMapper::toEloquent($counter);
        $counterEM->delete();
    }

    public function findById(int $id): Counter
    {
        $counterEM = CounterEloquentModel::findOrFail($id);
        return CounterMapper::fromEloquent($counterEM);
    }

    public function increment(int $counterId): void
    {
        DB::table('counters')
            ->where('id', $counterId)
            ->increment('sum_value');
    }
}
