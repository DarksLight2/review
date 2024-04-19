<?php

namespace App\Domains\Box\Enums;

enum BoxPermissionEnum
{
    case Create;
    case Delete;
    case Read;
    case Update;
}
