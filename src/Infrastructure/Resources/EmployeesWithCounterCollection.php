<?php

namespace Src\Infrastructure\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Request;
class EmployeesWithCounterCollection extends ResourceCollection
{

    public $collects = EmployeesWithCounterResource::class;

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
