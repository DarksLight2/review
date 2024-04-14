<?php

namespace App\Domains\User\Contracts;

use App\Domains\User\DTO\AuthenticationDTO;

interface AuthenticationServiceContract
{
    public function attempt(AuthenticationDTO $dto): bool;
}
