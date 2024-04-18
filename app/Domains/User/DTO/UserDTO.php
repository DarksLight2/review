<?php

namespace App\Domains\User\DTO;

use App\Domains\Common\Traits\DTO;

readonly class UserDTO
{
    use DTO;

    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
    ) {}
}
