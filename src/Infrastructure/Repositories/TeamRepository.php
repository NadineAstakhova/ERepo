<?php

namespace Src\Infrastructure\Repositories;

use Src\Domain\Models\Team;
use Src\Domain\Repositories\TeamRepositoryInterface;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;
use Src\Infrastructure\Mappers\TeamMapper;

class TeamRepository implements TeamRepositoryInterface
{

    public function store(Team $team)
    {
        $teamEM = TeamMapper::toEloquent($team);
        $teamEM->save();
    }

    public function delete(Team $team)
    {
        $teamEM = TeamMapper::toEloquent($team);
        $teamEM->delete();
    }

    public function findById(int $id): Team
    {
        $teamEM = TeamEloquentModel::findOrFail($id);
        return TeamMapper::fromEloquent($teamEM);
    }
}
