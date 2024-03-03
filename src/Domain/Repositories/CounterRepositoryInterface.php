<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\Counter;

interface CounterRepositoryInterface
{
    public function store(Counter $counter);

    public function delete(Counter $counter);

    public function findById(int $id): Counter;

    /**
     * Increment the summary of a counter
     * @param int $counterId
     * @return mixed
     */
    public function increment(int $counterId);
}
