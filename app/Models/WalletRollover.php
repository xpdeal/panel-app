<?php

namespace App\Models;

use Bavix\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $wallet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $rollover_type
 * @property string|null $origin
 * @property string|null $amount
 * @property int|null $precision
 * @property string|null $won
 * @property string|null $lost
 * @property int|null $bets
 * @property array|null $meta
 * @property int|null $active
 * @property-read Wallet|null $wallet
 *
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereBets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereLost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover wherePrecision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereRolloverType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereWalletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover whereWon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletRollover withoutTrashed()
 *
 * @mixin \Eloquent
 */
class WalletRollover extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'wallet_id',
        'rollover_type',
        'origin',
        'amount',
        'precision',
        'won',
        'lost',
        'bets',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
