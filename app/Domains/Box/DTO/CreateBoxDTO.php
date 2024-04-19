<?php

namespace App\Domains\Box\DTO;

use App\Domains\Box\Enums\StateEnum;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

readonly class CreateBoxDTO
{
    public function __construct(
        public RecipientDTOCollection $recipients = new RecipientDTOCollection(),
        public EntitiesDTOCollection  $entities   = new EntitiesDTOCollection(),
    ) {}
}
