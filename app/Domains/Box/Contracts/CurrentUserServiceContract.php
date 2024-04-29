<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

interface CurrentUserServiceContract
{
    public function notifyCurrentUser(string $message, NotificationObtainmentEnum $obtainment): void;
}
