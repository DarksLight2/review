<?php

namespace App\Domains\Contact\Enums;

enum SexEnum: int
{
    case Male       = 0;
    case Female     = 1;
    case Other      = 2;
    case NotDefined = 3;
}
