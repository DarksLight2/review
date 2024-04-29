<?php

namespace App\Domains\Box\DTO;

use App\Domains\Common\Traits\DTO;
use App\Domains\Box\Enums\StateEnum;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

final readonly class BoxDTO
{
    use DTO;

    public function __construct(
        public string                 $id,
        public StateEnum              $state,
//        public DecorDTO               $decor,
        public RecipientDTOCollection $recipients = new RecipientDTOCollection(),
        public EntitiesDTOCollection  $entities   = new EntitiesDTOCollection(),
    ) {}
}
