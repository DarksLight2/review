<?php

namespace App\Providers;

use App\Repositories\BoxRepository;
use Illuminate\Support\ServiceProvider;
use App\Domains\Box\Contracts\BoxRepositoryContract;

class BoxServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BoxRepositoryContract::class, BoxRepository::class);
    }
}
