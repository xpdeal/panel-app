<?php

namespace App\Models;

use Bavix\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 * @method static first()
 * @method static where(string $string, int $int)
 * @method getWallet(string $string)
 *
 * @property mixed $compareTarget
 * @property int|mixed $fulfilled
 * @property int|mixed $active
 * @property mixed $wallet
 * @property int $id
 * @property int $wallet_id
 * @property Rollover|null $rollover
 * @property int|null $target
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property array|null $meta
 * @property int|null $rollover_id
 * @property-read float $compare_target
 * @property-read mixed $wallet_bounty_amount
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereFulfilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereRollover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereRolloverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover whereWalletId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Rollover withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Rollover extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $appends = ['compareTarget', 'walletBountyAmount'];

    protected $fillable = [
        'active',
        'wallet_id',
        'rollover_id',
        'rollover',
        'meta',
        'target',
        'fulfilled',
    ];

    protected $casts = [
        'meta' => 'array',
        'amount' => 'integer',
        'target' => 'integer',
        'fulfilled' => 'integer',
    ];

    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function rollover(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Rollover::class);
    }

    public function getWalletBountyAmountAttribute()
    {
        $wallet = $this->wallet;
        if ($wallet) {

            return $wallet->amount;
        }

        return 0;
    }

    public function getCompareTargetAttribute(): float
    {
        return $this->fulfilled / $this->target * 100;
    }
}
