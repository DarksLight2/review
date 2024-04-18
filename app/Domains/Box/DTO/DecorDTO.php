<?php

namespace App\Domains\Box\DTO;

use App\Domains\Box\Enums\StateEnum;
use App\Domains\Box\Enums\DecorTypeEnum;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

readonly class DecorDTO
{
    public function __construct(
        public string        $id,
        public string        $resource,
        public string        $name,
        public DecorTypeEnum $type,
    ) {}
}
