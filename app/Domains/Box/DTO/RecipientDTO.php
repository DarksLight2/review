<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;

class RecipientDTO
{
    use DTO;

    public function __construct(
        public string  $id,
        public ?string $username  = null,
        public ?string $firstname = null,
        public ?string $surname   = null,
        public ?string $email     = null,
        public ?string $phone     = null,
        public ?string $telegram  = null,
    ) {}
}
