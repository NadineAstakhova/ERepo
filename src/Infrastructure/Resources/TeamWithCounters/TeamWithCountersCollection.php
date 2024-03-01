<?php

namespace Src\Infrastructure\Resources\TeamWithCounters;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamWithCountersCollection extends ResourceCollection
{
    public $collects = TeamResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'count' => $this->count(),
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'data' => $this->collection
        ];
    }
}
