<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property int $user_id
 * @property string $sequence
 * @property string|null $event
 * @property array|null $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Sequence withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Sequence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'sequence',
        'event',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
