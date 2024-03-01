<?php

namespace Src\Infrastructure\Resources\TeamWithCounters;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterForTeamWithSumStepsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sum_steps' =>  $this->sum_value,
        ];
    }
}
