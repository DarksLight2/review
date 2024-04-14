<?php

namespace App\Domains\User\DTO;

readonly class AuthenticationDTO
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
