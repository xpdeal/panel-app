<?php

namespace App\Traits;

trait UserIdTrait
{
    protected static function bootUserIdTrait()
    {
        static::creating(function ($model) {
            $model->user_id = auth()->user()->getAuthIdentifier();
        });
    }
}
