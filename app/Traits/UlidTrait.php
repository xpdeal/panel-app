<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UlidTrait
{
    protected static function bootUlidTrait()
    {
        static::creating(function ($model) {
            $model->ulid = Str::ulid();
        });
    }
}
