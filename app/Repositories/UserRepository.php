<?php

namespace App\Repositories;

use App\Domains\User\Models\User;
use App\Domains\User\DTO\UserDTO;
use App\Domains\User\Exceptions\UserDomainException;
use App\Domains\User\Contracts\UserRepositoryContract;

class UserRepository implements UserRepositoryContract
{
    /**
     * @throws UserDomainException
     */
    public function create(array $attributes): UserDTO
    {
        $model = User::query()->create($attributes);
        if(!$model->wasRecentlyCreated) throw new UserDomainException("Unable to create user");
        return UserDTO::fill($model->toArray());
    }
}
