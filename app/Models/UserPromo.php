<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PromotionTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $active
 * @property int $user_id
 * @property int $promo_id
 * @property string|null $promotable_type
 * @property string|null $promotable_id
 * @property string $amount
 * @property int|null $wallet_id
 * @property int|null $stock
 * @property string|null $expired_at
 * @property string|null $used_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $ulid
 * @property PromotionTypeEnum|null $promo_type
 * @property int|null $provider_game_id
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\ProviderGame|null $providerGame
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Wallet|null $wallet
 *
 * @method static Builder|UserPromo active()
 * @method static Builder|UserPromo expired()
 * @method static Builder|UserPromo newModelQuery()
 * @method static Builder|UserPromo newQuery()
 * @method static Builder|UserPromo onlyTrashed()
 * @method static Builder|UserPromo query()
 * @method static Builder|UserPromo used()
 * @method static Builder|UserPromo whereActive($value)
 * @method static Builder|UserPromo whereAmount($value)
 * @method static Builder|UserPromo whereCreatedAt($value)
 * @method static Builder|UserPromo whereDeletedAt($value)
 * @method static Builder|UserPromo whereExpiredAt($value)
 * @method static Builder|UserPromo whereId($value)
 * @method static Builder|UserPromo wherePromoId($value)
 * @method static Builder|UserPromo wherePromoType($value)
 * @method static Builder|UserPromo wherePromotableId($value)
 * @method static Builder|UserPromo wherePromotableType($value)
 * @method static Builder|UserPromo whereProviderGameId($value)
 * @method static Builder|UserPromo whereStock($value)
 * @method static Builder|UserPromo whereUlid($value)
 * @method static Builder|UserPromo whereUpdatedAt($value)
 * @method static Builder|UserPromo whereUsedAt($value)
 * @method static Builder|UserPromo whereUserId($value)
 * @method static Builder|UserPromo whereWalletId($value)
 * @method static Builder|UserPromo withTrashed()
 * @method static Builder|UserPromo withoutTrashed()
 *
 * @mixin \Eloquent
 */
class UserPromo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'active',
        'ulid',
        'user_id',
        'wallet_id',
        'promotable_type',
        'promotable_id',
        'amount',
        'stock',
        'expired_at',
        'used_at',
        'provider_game_id',
        'promo_id',
        'promo_type',
    ];

    protected $casts = [
        'active' => 'boolean',
        'promo_type' => PromotionTypeEnum::class,
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function providerGame(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProviderGame::class);
    }

    public function promo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Promo::class);
    }

    public function scopeExpired(Builder $query): void
    {
        $query->where('expired_at', '<', now());
    }

    public function scopeUsed(Builder $query): void
    {
        $query->whereNotNull('used_at');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }
}
