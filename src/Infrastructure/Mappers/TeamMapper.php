<?php

namespace Src\Infrastructure\Mappers;

use Src\Domain\Models\Team;
use Src\Infrastructure\Database\EloquentModels\TeamEloquentModel;

class TeamMapper
{
    public static function toEloquent(Team $team): TeamEloquentModel
    {
        $teamEM = new TeamEloquentModel();
        if ($team->id) {
            $teamEM = TeamEloquentModel::query()->findOrFail($team->id);
        }
        $teamEM->name = $team->name;
        return $teamEM;
    }

    public static function fromRequestArray(array $data, ?int $teamId = null): Team
    {
        return new Team(
            id: $teamId,
            name: $data["name"]
        );
    }

    public static function fromEloquent(TeamEloquentModel $teamEM): Team
    {
        return new Team(
            id: $teamEM->id,
            name: $teamEM->name
        );
    }
}
