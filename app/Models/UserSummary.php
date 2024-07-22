<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserSummaryEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static updateOrCreate(array $array, array $array1)
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $meta
 * @property string $summary_key
 * @property string $summary_value
 * @property int $version
 * @property string $cast
 * @property string $operation
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereCast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereOperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereSummaryKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereSummaryValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSummary whereVersion($value)
 *
 * @mixin \Eloquent
 */
class UserSummary extends Model
{
    protected $fillable = [
        'meta',
        'summary_key',
        'summary_value',
        'user_id',
        'version',
        'cast',
        'operation',
    ];

    protected $casts = [
        'meta' => 'array',
        'version' => 'integer',
        // 'summary_key' => UserSummaryEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
