<?php

namespace App\Models;

use App\Enums\User\SummableEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property string|null $summable_type
 * @property string|null $summable_id
 * @property int $user_id
 * @property SummableEnum|null $summary
 * @property int|null $fulfilled
 * @property int|null $target
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereFulfilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereSummableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereSummableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummable withoutTrashed()
 *
 * @mixin \Eloquent
 */
class UserSummable extends Model
{
    use SoftDeletes;

    protected $table = 'user_summable';

    protected $fillable = [
        'active',
        'user_id',
        'summable_type',
        'summable_id',
        'fulfilled',
        'target',
        'summary',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'fulfilled' => 'integer',
        'target' => 'integer',
        'summary' => SummableEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
