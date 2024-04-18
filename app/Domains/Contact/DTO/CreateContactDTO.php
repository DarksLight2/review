<?php

namespace App\Domains\Contact\DTO;

class CreateContactDTO
{
    public function __construct(
        public string $id,
    ) {}
}
