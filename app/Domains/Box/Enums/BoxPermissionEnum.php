<?php

namespace App\Domains\Box\Enums;

enum BoxPermissionEnum: string
{
    case Create = 'create';
    case Delete = 'delete';
    case View   = 'view';
    case Update = 'update';
}
