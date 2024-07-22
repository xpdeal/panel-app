<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $authable_type
 * @property string|null $authable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereAuthableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereAuthableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAuth withoutTrashed()
 *
 * @mixin \Eloquent
 */
class UserAuth extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'authable_type',
        'authable_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
