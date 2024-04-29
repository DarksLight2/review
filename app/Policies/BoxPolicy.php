<?php

namespace App\Policies;

use App\Domains\User\Models\User;
use App\Models\Box;
use Illuminate\Auth\Access\Response;

class BoxPolicy
{
    public function create(User $user): bool
    {

        return $user->role === 1;
    }
}
