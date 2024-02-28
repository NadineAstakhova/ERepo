<?php

namespace Src\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Src\Domain\Models\Counter;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Infrastructure\Mappers\CounterMapper;

class CounterRepository implements CounterRepositoryInterface
{

    public function store(Counter $counter)
    {
        $counterEM = CounterMapper::toEloquent($counter);
        $counterEM->save();
    }

    public function delete(Counter $counter)
    {
        $counterEM = CounterMapper::toEloquent($counter);
        $counterEM->delete();
    }

    public function findById(int $id): Counter
    {
        // TODO: Implement findById() method.
    }

    public function increment(int $counterId): void
    {
        DB::table('counters')
            ->where('id', $counterId)
            ->increment('sum_value');
    }
}
