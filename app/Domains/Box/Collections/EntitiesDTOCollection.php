<?php

namespace App\Domains\Box\Collections;


use App\Domains\Box\DTO\EntityDTO;
use App\Domains\Common\DTOCollection;

/**
 * @template-extends DTOCollection<EntityDTO>
 */
class EntitiesDTOCollection extends DTOCollection
{
    protected static function dto(): string
    {
        return EntityDTO::class;
    }
}
