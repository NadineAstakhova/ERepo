<?php

namespace Src\Domain\Repositories;

use Src\Domain\Models\Team;

interface TeamRepositoryInterface
{
    public function store(Team $team);

    public function delete(Team $team);

    public function findById(int $id): Team;

}
