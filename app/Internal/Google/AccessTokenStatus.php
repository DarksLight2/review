<?php

namespace App\Internal\Google;

enum AccessTokenStatus
{
    case Expired;
    case Ok;
    case NeedAuthorization;
}
