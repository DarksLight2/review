<?php

namespace App\Domains\User\DTO;

readonly class UserDTO
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
    ) {}
}
