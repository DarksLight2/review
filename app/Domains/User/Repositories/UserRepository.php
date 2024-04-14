<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Models\User;
use App\Domains\User\Contracts\UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    public function create(array $attributes): bool
    {
        return User::query()->create($attributes)->wasRecentlyCreated;
    }
}
