<?php

namespace Src\Domain\Models;

class Employee implements \JsonSerializable
{

    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $surname,
        public readonly int $teamId
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'teamId' => $this->teamId
        ];
    }
}
