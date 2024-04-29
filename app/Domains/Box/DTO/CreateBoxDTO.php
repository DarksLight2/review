<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

readonly class CreateBoxDTO
{
    use DTO;

    public function __construct(
        public RecipientDTOCollection $recipients = new RecipientDTOCollection(),
        public EntitiesDTOCollection  $entities   = new EntitiesDTOCollection(),
    ) {}
}
