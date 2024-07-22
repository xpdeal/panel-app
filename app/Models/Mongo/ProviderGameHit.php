<?php

namespace App\Models\Mongo;

use Illuminate\Database\Eloquent\Model;

class ProviderGameHit extends Model
{
    protected $connection = 'mongodb';

    protected $collection = 'provider_game_hits';

    protected $fillable = [
        'game_id',
        'ip_address',
        'user_id',
    ];
}
