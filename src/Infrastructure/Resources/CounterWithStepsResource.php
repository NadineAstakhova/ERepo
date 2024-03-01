<?php

namespace Src\Infrastructure\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterWithStepsResource  extends JsonResource
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
            'steps_count' =>  $this->whenPivotLoaded("employee_counter", function () {
                return $this->pivot->steps_value;
            }),
        ];
    }
}
