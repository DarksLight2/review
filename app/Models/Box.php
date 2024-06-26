<?php

namespace App\Models;

use App\Domains\Box\Enums\StateEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Box extends Model
{
    use HasUuids;

    protected $fillable = [
        'state',
    ];

    protected $casts = [
        'state' => StateEnum::class,
    ];
    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class);
    }
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Products::class);
    }
    public function giftCards(): BelongsToMany
    {
        return $this->belongsToMany(GiftCards::class);
    }
    public function polls(): BelongsToMany
    {
        return $this->belongsToMany(Polls::class);
    }
}
