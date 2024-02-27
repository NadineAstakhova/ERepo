<?php

namespace Src\Infrastructure\Services;

use Src\Domain\Contracts\TeamServiceInterface;
use Src\Domain\Models\Team;
use Src\Domain\Repositories\TeamRepositoryInterface;
use Src\Infrastructure\Mappers\TeamMapper;

class TeamService implements TeamServiceInterface
{

    public function __construct(
        private readonly TeamRepositoryInterface $teamRepository

    ) {}

    public function storeTeam(array $data): void
    {
        $team = TeamMapper::fromRequestArray($data);
        $this->teamRepository->store($team);
    }

    public function deleteTeam(int $teamId)
    {
        $team = $this->teamRepository->findById($teamId);
        $this->teamRepository->delete($team);
    }
}
