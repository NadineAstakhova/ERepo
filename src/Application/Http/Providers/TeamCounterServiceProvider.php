<?php

namespace Src\Application\Http\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Contracts\TeamServiceInterface;
use Src\Domain\Repositories\TeamRepositoryInterface;
use Src\Infrastructure\Repositories\TeamRepository;
use Src\Infrastructure\Services\TeamService;

class TeamCounterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(TeamServiceInterface::class, TeamService::class);
    }
}
