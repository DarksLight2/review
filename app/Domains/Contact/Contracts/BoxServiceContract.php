<?php

namespace App\Domains\Contact\Contracts;

interface BoxServiceContract
{
    public function attachContact(string $box_id, string $contact_id): void;
}
