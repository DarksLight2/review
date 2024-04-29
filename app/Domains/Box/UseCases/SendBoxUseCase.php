<?php

namespace App\Domains\Box\UseCases;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\Enums\StateEnum;
use App\Domains\Box\Enums\SendMethodEnum;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Box\Actions\ResolveFailuresAction;
use App\Domains\Box\Actions\ResolveBoxSenderAction;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

class SendBoxUseCase
{
    public function handle(BoxDTO $dto, SendMethodEnum $method, BoxServiceContract $service): void
    {
        if($dto->state === StateEnum::Inactive) {
            $service->notifyCurrentUser('Вы не можете отправить неактивный бокс.', NotificationObtainmentEnum::Alert);
            return;
        }

        if($dto->state === StateEnum::Received) {
            $service->notifyCurrentUser('Данный бокс уже был отправлен.', NotificationObtainmentEnum::Alert);
            return;
        }

        $sender = (new ResolveBoxSenderAction)->handle($method, $service);

        $sender->send($dto);

        if($sender->existsFailures()) {
            (new ResolveFailuresAction())->handle($service, $sender->failed());
        }
    }
}
