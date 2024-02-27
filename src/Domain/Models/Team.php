<?php

declare(strict_types=1);

namespace Src\Domain\Models;
class Team implements \JsonSerializable
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name
    ) {}

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }

}
