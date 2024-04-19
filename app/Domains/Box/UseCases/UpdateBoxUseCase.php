<?php

namespace App\Domains\Box\UseCases;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Box\Enums\BoxPermissionStatusEnum;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

class UpdateBoxUseCase
{
    public function handle(
        BoxDTO $original_box,
        BoxDTO $updated_box,
        BoxServiceContract $service,

    ): void
    {
        if($service->checkPermission($original_box, BoxPermissionEnum::Update) === BoxPermissionStatusEnum::Allowed) {
            $service->updateBox($original_box, $updated_box);
            $service->notifyCurrentUser('Вы успешно изменили бокс.', NotificationObtainmentEnum::Alert);
            $service->notifyCreator('Один из ваших боксов был изменён.', NotificationObtainmentEnum::Alert);
            return;
        }

        $service->notifyCurrentUser('У вас недостаточно прав для этого действия.', NotificationObtainmentEnum::Alert);
    }
}
