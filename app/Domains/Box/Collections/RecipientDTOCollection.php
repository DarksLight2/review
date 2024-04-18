<?php

namespace App\Domains\Box\Collections;


use App\Domains\Common\DTOCollection;
use App\Domains\Box\DTO\RecipientDTO;

/**
 * @template-extends DTOCollection<RecipientDTO>
 */
class RecipientDTOCollection extends DTOCollection
{
    protected function dto(): string
    {
        return RecipientDTO::class;
    }
}
