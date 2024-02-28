<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\CounterServiceInterface;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Domain\Repositories\TeamRepositoryInterface;
use Src\Infrastructure\Mappers\CounterMapper;

class CounterService implements CounterServiceInterface
{
    public function __construct(
        private readonly CounterRepositoryInterface $counterRepository,
        private readonly TeamRepositoryInterface $teamRepository

    ) {}

    public function addCounterToTeam(array $data): void
    {
        $team = $this->teamRepository->findById($data['team_id']);

        $counter = CounterMapper::fromRequestArray($data, $team->id);

        $this->counterRepository->store($counter);
    }

    public function removeCounterFromTeam(int $counterId): void
    {
        $counter = $this->counterRepository->findById($counterId);
        $this->counterRepository->delete($counter);
    }
}
