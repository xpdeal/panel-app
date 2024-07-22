<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * @method static creating(\Closure $param)
 * @method static saving(\Closure $param)
 */
trait SluggableTrait
{
    protected static function bootSluggableTrait(): void
    {
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
}
