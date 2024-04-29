<?php

namespace App\Domains\Box\Enums;

enum BoxSendingStatusEnum
{
    case Sent;
    case Failure;
    case Delivered;
    case DontSent;
}
