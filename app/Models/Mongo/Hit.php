<?php

namespace App\Models\Mongo;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $connection = 'mongodb';
    // protected $collection = 'hits';

    protected $fillable = [
        'route',
        'visit',
    ];
}
