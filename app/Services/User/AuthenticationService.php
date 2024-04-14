<?php

namespace App\Services\User;

use App\Domains\User\DTO\AuthenticationDTO;
use App\Domains\User\Contracts\AuthenticationServiceContract;

class AuthenticationService implements AuthenticationServiceContract
{
    public function attempt(AuthenticationDTO $dto): bool
    {
        return auth()->attempt([
            'email' => $dto->email,
            'password' => $dto->password
        ]);
    }
}
