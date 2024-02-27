<?php

namespace Src\Domain\Contracts;

use Src\Domain\Models\Team;

interface TeamServiceInterface
{
    public function storeTeam(array $data);

    public function deleteTeam(int $teamId);

}
