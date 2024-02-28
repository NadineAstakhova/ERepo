<?php

namespace Src\Infrastructure\Repositories;

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

    public function increment(Counter $counter)
    {
        // TODO: Implement increment() method.
    }
}
