<?php

namespace App\Domains\Box\Collections;


use App\Domains\Common\DTOCollection;
use App\Domains\Box\DTO\ContactDetailDTO;

/**
 * @template-extends DTOCollection<ContactDetailDTO>
 */
class ContactDetailDTOCollection extends DTOCollection
{
    protected function dto(): string
    {
        return ContactDetailDTO::class;
    }
}
