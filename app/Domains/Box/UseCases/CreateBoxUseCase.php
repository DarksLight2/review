<?php

namespace App\Domains\Box\UseCases;

use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

class CreateBoxUseCase
{
    public function handle(CreateBoxDTO $create_box_bto, BoxServiceContract $service): void
    {
        if($service->checkPermission(BoxPermissionEnum::Create)) {
            $service->notifyCurrentUser('У вас недостаточно прав для создания бокса.', NotificationObtainmentEnum::Alert);
            return;
        }
        $service->createBox($create_box_bto);
        $service->notifyCurrentUser('Вы успешно создали новый бокс.', NotificationObtainmentEnum::Alert);
    }
}
