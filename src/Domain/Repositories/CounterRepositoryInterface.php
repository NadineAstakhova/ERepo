<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\Counter;

interface CounterRepositoryInterface
{
    public function store(Counter $counter);

    public function delete(Counter $counter);

    public function findById(int $id): Counter;

    public function increment(Counter $counter);
}
