<?php

namespace App\Domains\Box\Enums;

enum ContactDetailTypeEnum: int
{
    case Email    = 0;
    case Phone    = 1;
    case Telegram = 2;
}
