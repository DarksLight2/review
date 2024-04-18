<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Collections\ContactDetailDTOCollection;

class RecipientDTO
{
    use DTO;

    public function __construct(
        public string                     $id,
        public ContactDetailDTOCollection $contact_details = new ContactDetailDTOCollection(),
        public ?string                    $username  = null,
        public ?string                    $firstname = null,
        public ?string                    $surname   = null,
    ) {}
}
