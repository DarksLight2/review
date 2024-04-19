<?php

namespace App\Domains\Box\UseCases;

use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Box\Contracts\BoxServiceContract;
use App\Domains\Box\Enums\BoxPermissionStatusEnum;

class CreateBoxUseCase
{
    public function handle(CreateBoxDTO $create_box_bto, BoxServiceContract $service): void
    {
        if($service->checkPermission(null, BoxPermissionEnum::Create) === BoxPermissionStatusEnum::Allowed) {
            return;
        }
            $service->createBox($create_box_bto);
    }
}
