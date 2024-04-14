<?php

namespace App\Domains\User\Actions;

use App\Domains\User\DTO\CreateUserDTO;
use App\Domains\User\Contracts\UserRepositoryContract;

class CreateUserAction
{
    public function handle(UserRepositoryContract $repository, CreateUserDTO $dto): bool
    {
        return $repository->create($dto->toArray());
    }
}
