<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\User\AuthenticationService;
use App\Domains\User\Contracts\UserRepositoryContract;
use App\Domains\User\Contracts\AuthenticationServiceContract;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(AuthenticationServiceContract::class, AuthenticationService::class);
    }
}
