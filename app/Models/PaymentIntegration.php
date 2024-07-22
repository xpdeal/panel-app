<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property string $secret_key
 * @property string $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property array|null $meta
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereSecretKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentIntegration withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PaymentIntegration extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'meta',
        'secret_key',
        'client_id',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
