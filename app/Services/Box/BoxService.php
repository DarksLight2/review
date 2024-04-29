<?php

namespace App\Services\Box;

use App\Models\Box;
use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\EntityDTO;
use App\Domains\Box\Enums\StateEnum;
use Illuminate\Support\Facades\Gate;
use App\Domains\Box\DTO\CreateBoxDTO;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use App\Domains\Box\Enums\EntityTypeEnum;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

class BoxService implements BoxServiceContract
{

    public function attachContact(string $box_id, string $contact_id): void
    {

    }

    /**
     * @throws \Exception
     */
    public function createBox(CreateBoxDTO $box): BoxDTO
    {
        $model = Box::query()
            ->create([
                'state' => StateEnum::Inactive,
            ]);

        # Возможно вынести в джоб, но тогда пользователь
        # может быть в недоумении, что у него ничего не добавилось
        $model->recipients()
            ->sync($box->recipients->pluck('id'));
        $model->products()
            ->sync($box->entities->pluck('id', fn(EntityDTO $item) => $item->type === EntityTypeEnum::Product));
        $model->polls()
            ->sync($box->entities->pluck('id', fn(EntityDTO $item) => $item->type === EntityTypeEnum::Poll));
        $model->giftCards()
            ->sync($box->entities->pluck('id', fn(EntityDTO $item) => $item->type === EntityTypeEnum::Card));
        #

        return new BoxDTO(
            id: $model->id,
            state: $model->state,
            recipients: $box->recipients,
            entities: $box->entities,
        );
    }

    public function removeBox(BoxDTO $box): void
    {
        // TODO: Implement removeBox() method.
    }

    public function updateBox(BoxDTO $original_box, BoxDTO $updated_box): void
    {
        // TODO: Implement updateBox() method.
    }

    /**
     * @throws \Exception
     */
    public function notifyCurrentUser(string $message, NotificationObtainmentEnum $obtainment): void
    {
        # TODO: Вынести в отдельный класс работу с уведомлениями

        match ($obtainment) {
            NotificationObtainmentEnum::Alert => function () use ($message) {
                # В идеале отправлять через веб-сокеты
                # Но в силу того, что сейчас трудные времена (мне лень) будет вот так (^_^)
                $session_id = Session::getId();
                $exists_alerts = unserialize(Redis::get("user:{$session_id}:alerts")) ?? [];
                $exists_alerts[] = $message;
                Redis::set("user:{$session_id}:alerts", serialize($exists_alerts));
            },
            default => throw new \Exception('It doesnt work :`(')
        };
    }

    public function checkPermission(BoxPermissionEnum $permission): bool
    {
        return Gate::check($permission->value, Box::class);
    }

    public function sendEmail(string $email, string $content): void
    {
        // TODO: Implement sendEmail() method.
    }

    public function sendTelegram(): void
    {
        // TODO: Implement sendTelegram() method.
    }

    public function sendWhatsapp(): void
    {
        // TODO: Implement sendWhatsapp() method.
    }

    public function createRecipientActiveLog(string $message, string $recipient_id): void
    {
        // TODO: Implement createRecipientActiveLog() method.
    }
}
