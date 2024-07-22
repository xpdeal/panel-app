<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $active
 * @property string $hall
 * @property string|null $rtp
 * @property string $hall_identity
 * @property string $hall_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereHall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereHallIdentity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereHallKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereRtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderHall withoutTrashed()
 *
 * @mixin \Eloquent
 */
class ProviderHall extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'active',
        'hall',
        'hall_identity',
        'hall_key',
        'rtp',
    ];

    protected $casts = [
        'active' => 'boolean',
        'rtp' => 'decimal:2',
    ];
}
