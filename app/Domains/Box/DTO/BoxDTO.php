<?php

namespace App\Domains\Box\DTO;

use App\Domains\Box\Enums\StateEnum;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

readonly class BoxDTO
{
    public function __construct(
        public string                 $id,
        public StateEnum              $state,
        public DecorDTO               $decor,
        public RecipientDTOCollection $recipients = new RecipientDTOCollection(),
        public EntitiesDTOCollection  $entities   = new EntitiesDTOCollection(),
    ) {}
}
