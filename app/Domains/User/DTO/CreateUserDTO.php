<?php

namespace App\Domains\User\DTO;

readonly class CreateUserDTO
{
    public function __construct(
        public string $firstname,
        public string $lastname,
        public string $email,
        public string $password,
    ) {}

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
            'password'  => bcrypt($this->password),
        ];
    }
}
