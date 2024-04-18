<?php

namespace App\Domains\User\Contracts;

use App\Domains\User\DTO\UserDTO;

interface UserRepositoryContract
{
    public function create(array $attributes): UserDTO;
}
