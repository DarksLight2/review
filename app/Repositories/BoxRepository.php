<?php

namespace App\Repositories;

use App\Models\Box;
use App\Domains\Box\DTO\EntityDTO;
use App\Domains\Box\DTO\RecipientDTO;
use App\Domains\Box\Enums\EntityTypeEnum;
use App\Domains\Box\Contracts\BoxRepositoryContract;
use App\Domains\Box\Collections\EntitiesDTOCollection;
use App\Domains\Box\Collections\RecipientDTOCollection;

class BoxRepository implements BoxRepositoryContract
{
    public function findById()
    {

    }

    public function getRecipients(string $box_id): RecipientDTOCollection
    {
        $recipients = new RecipientDTOCollection();

        Box::query()
            ->with(['contacts'])
            ->find($box_id)
            ->contacts
            ->each(function (Contact $recipient) use ($recipients) {
                $recipients->push(RecipientDTO::fill($recipient->toArray()));
            });

        return $recipients;
    }

    public function getEntities(string $box_id): EntitiesDTOCollection
    {
        $entities = new EntitiesDTOCollection();

        $box = Box::query()
            ->with(['polls', 'products', 'giftCards'])
            ->find($box_id);

            $box->polls->each(function (object $entity) use ($entities) {
                $entity->toArray()['type'] = EntityTypeEnum::Poll;
                $entities->push(EntityDTO::fill($entity->toArray()));
            });

            $box->products->each(function (Product $entity) use ($entities) {
                $entity->toArray()['type'] = EntityTypeEnum::Product;
                $entities->push(EntityDTO::fill($entity->toArray()));
            });

            $box->giftCards->each(function (GiftCard $entity) use ($entities) {
                $entity->toArray()['type'] = EntityTypeEnum::Card;
                $entities->push(EntityDTO::fill($entity->toArray()));
            });

        return $entities;
    }
}
