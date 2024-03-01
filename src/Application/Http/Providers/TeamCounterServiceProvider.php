<?php

namespace Src\Application\Http\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\Contracts\CounterServiceInterface;
use Src\Domain\Contracts\EmployeeStepCounterServiceInterface;
use Src\Domain\Contracts\TeamCounterServiceInterface;
use Src\Domain\Contracts\TeamServiceInterface;
use Src\Domain\Repositories\CounterRepositoryInterface;
use Src\Domain\Repositories\TeamCounterRepositoryInterface;
use Src\Domain\Repositories\TeamRepositoryInterface;
use Src\Infrastructure\Repositories\CounterRepository;
use Src\Infrastructure\Repositories\TeamCounterRepository;
use Src\Infrastructure\Repositories\TeamRepository;
use Src\Infrastructure\Services\CounterService;
use Src\Infrastructure\Services\EmployeeStepCounterService;
use Src\Infrastructure\Services\TeamCounterService;
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
        $this->app->bind(CounterRepositoryInterface::class, CounterRepository::class);
        $this->app->bind(CounterServiceInterface::class, CounterService::class);
        $this->app->bind(EmployeeStepCounterServiceInterface::class, EmployeeStepCounterService::class);
        $this->app->bind(TeamCounterServiceInterface::class, TeamCounterService::class);
        $this->app->bind(TeamCounterRepositoryInterface::class, TeamCounterRepository::class);
    }
}
