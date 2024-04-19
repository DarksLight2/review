<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;
use App\Domains\Box\Enums\BoxPermissionStatusEnum;
use App\Domains\Common\Enums\NotificationObtainmentEnum;

interface BoxServiceContract
{
    public function attachContact(string $box_id, string $contact_id): void;
    public function createBox(CreateBoxDTO $box): BoxDTO;
    public function removeBox(BoxDTO $box): void;
    public function updateBox(BoxDTO $original_box, BoxDTO $updated_box): void;
    public function notifyCreator(string $message, NotificationObtainmentEnum $obtainment): void;
    public function notifyCurrentUser(string $message, NotificationObtainmentEnum $obtainment): void;
    public function checkPermission(?BoxDTO $box, BoxPermissionEnum $permission): BoxPermissionStatusEnum;
}
