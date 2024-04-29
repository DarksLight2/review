<?php

namespace App\Domains\Box\Collections;


use App\Domains\Common\DTOCollection;
use App\Domains\Box\DTO\RecipientDTO;

/**
 * @template-extends DTOCollection<mixed, RecipientDTO>
 */
final class RecipientDTOCollection extends DTOCollection
{
    protected static function dto(): string
    {
        return RecipientDTO::class;
    }
}
