<?php

namespace App\Domains\Box\Contracts;

use App\Domains\Box\DTO\BoxDTO;
use App\Domains\Box\DTO\CreateBoxDTO;
use App\Domains\Box\Enums\BoxPermissionEnum;

interface BoxServiceContract extends BoxSenderServiceContract, RecipientActiveLogServiceContract, CurrentUserServiceContract
{
    public function createBox(CreateBoxDTO $box): BoxDTO;
    public function removeBox(BoxDTO $box): void;
    public function updateBox(BoxDTO $original_box, BoxDTO $updated_box): void;
    public function checkPermission(BoxPermissionEnum $permission): bool;
}
