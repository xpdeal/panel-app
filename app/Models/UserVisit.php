<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $ip_address
 * @property array|null $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserVisit whereUserId($value)
 *
 * @mixin \Eloquent
 */
class UserVisit extends Model
{
    use HasFactory;

    public $casts = [
        'payload' => 'array',
    ];

    protected $fillable = [
        'user_id',
        'ip_address',
        'payload',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
