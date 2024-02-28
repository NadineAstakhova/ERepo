<?php

namespace Src\Domain\Models;

class Counter
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly int $teamId,
        public readonly int $value = 0
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'teamId' => $this->teamId,
            'value' => $this->value
        ];
    }
}
