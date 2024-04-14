<?php

namespace App\Domains\Contact\DTO;

use App\Domains\Contact\Enums\SexEnum;

readonly class ContactDTO
{
    public function __construct(
        public string  $id,
        public SexEnum $sex,
        public ?string $firstname = null,
        public ?string $lastname  = null,
        public ?string $surname   = null,
        public ?string $email     = null,
        public ?string $whatsapp  = null,
        public ?string $telegram  = null,
        public ?string $phone     = null,
        public ?string $birthday  = null,
        public array   $purchases = [],
    ) {}
}
