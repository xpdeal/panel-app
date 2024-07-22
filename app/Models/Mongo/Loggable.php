<?php

namespace App\Models\Mongo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loggable extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'loggable';

    protected $fillable = [
        'tag',
        'payload',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}
