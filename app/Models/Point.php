<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'up_to',
        'description',
        'point_rules'
    ];

    protected $casts = [
        'point_rules' => 'array'
    ];
}
