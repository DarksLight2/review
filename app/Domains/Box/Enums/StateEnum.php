<?php

namespace App\Domains\Box\Enums;

enum StateEnum: int
{
    case Inactive = 0;
    case Active   = 1;
    case Received = 2;
}
