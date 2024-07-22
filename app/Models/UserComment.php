<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserComment withoutTrashed()
 *
 * @mixin \Eloquent
 */
class UserComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'comment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
