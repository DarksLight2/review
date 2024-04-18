<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

interface BoxRepositoryContract
{
    public function getRecipients(string $box_id): RecipientDTOCollection;
    public function getEntities(string $box_id): EntitiesDTOCollection;
}
