<?php

namespace Src\Infrastructure\Mappers;

use Src\Domain\Models\Counter;
use Src\Infrastructure\Database\EloquentModels\CounterEloquentModel;

class CounterMapper
{
    public static function toEloquent(Counter $counter): CounterEloquentModel
    {
        $counterEM = new CounterEloquentModel();
        if ($counter->id) {
            $counterEM = CounterEloquentModel::query()->findOrFail($counter->id);
        }
        $counterEM->name = $counter->name;
        $counterEM->team_id = $counter->teamId;
        $counterEM->sum_value = $counter->value;
        return $counterEM;
    }

    public static function fromRequestArray(array $data, int $teamId, ?int $counterId = null): Counter
    {
        return new Counter(
            id: $counterId,
            name: $data["name"],
            teamId: $teamId
        );
    }
}
