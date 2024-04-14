<?php

namespace App\Domains\Contact\Actions;

use App\Domains\Contact\DTO\ContactDTO;
use App\Domains\Contact\Contracts\BoxServiceContract;

class AttachToBoxAction
{
    public function handle(ContactDTO $contact, string $box_id, BoxServiceContract $box_service): void
    {
        $box_service->attachContact($box_id, $contact->id);
    }
}
