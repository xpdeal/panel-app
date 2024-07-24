<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'exist',
        'msg',
        'meta',
        'active'
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
