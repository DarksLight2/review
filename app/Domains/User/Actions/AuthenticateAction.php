<?php

namespace App\Domains\User\Actions;

use App\Domains\User\DTO\AuthenticationDTO;
use App\Domains\User\Contracts\AuthenticationServiceContract;

class AuthenticateAction
{
    public function handle(AuthenticationServiceContract $auth_service, AuthenticationDTO $dto): bool
    {
        return $auth_service->attempt($dto);
    }
}
