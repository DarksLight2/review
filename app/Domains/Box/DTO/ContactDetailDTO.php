<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Collections\ContactDetailDTOCollection;

class ContactDetailDTO
{
    use DTO;

    public function __construct(
        public string $name,
        public string $value,
        public ContactDetailDTOCollection $type,
    ) {}
}
