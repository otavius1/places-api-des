<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'city',
        'state',
    ];

    protected static function booted(): void
    {
        static::creating(function ($place) {
            $place->slug = Str::slug($place->name);
        });

        static::updating(function ($place) {
            $place->slug = Str::slug($place->name);
        });
    }
}
