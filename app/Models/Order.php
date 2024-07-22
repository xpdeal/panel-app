<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\OrderObserver;
use App\States\Order\OrderState;
use App\Traits\UlidTrait;
use App\Traits\UserIdTrait;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\ModelStates\HasStates;

/**
 * @method static where(string $string, mixed $user_id)
 *
 * @property int $id
 * @property string $ulid
 * @property string $orderable_type
 * @property int $orderable_id
 * @property int $user_id
 * @property string|null $paid_at
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $amount
 * @property int $precision
 * @property string $paymentable_type
 * @property string $paymentable_id
 * @property string|null $completed_at
 * @property-read \App\Models\User|null $user
 * @property mixed $transaction
 *
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order onlyTrashed()
 * @method static Builder|Order query()
 * @method static Builder|Order unpaid()
 * @method static Builder|Order whereAmount($value)
 * @method static Builder|Order whereCompletedAt($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereDeletedAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereMeta($value)
 * @method static Builder|Order whereOrderableId($value)
 * @method static Builder|Order whereOrderableType($value)
 * @method static Builder|Order wherePaidAt($value)
 * @method static Builder|Order wherePaymentableId($value)
 * @method static Builder|Order wherePaymentableType($value)
 * @method static Builder|Order wherePrecision($value)
 * @method static Builder|Order whereStatusId($value)
 * @method static Builder|Order whereUlid($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @method static Builder|Order withTrashed()
 * @method static Builder|Order withoutTrashed()
 *
 * @property array|null $audit
 * @property int|null $transaction_id
 *
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static Builder|Order whereAudit($value)
 * @method static Builder|Order whereTransactionId($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([OrderObserver::class])]
class Order extends Model
{
    use HasFactory;
    use HasStates;
    use SoftDeletes;
    use UlidTrait;
    use UserIdTrait;

    protected $fillable = [
        'ulid',
        'orderable_id',
        'orderable_type',
        'paymentable_id',
        'paymentable_type',
        'amount',
        'precision',
        'user_id',
        'state',
        'paid_at',
        'completed_at',
        'meta',
        'created_at',
        'audit',
        'transaction_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'meta' => 'array',
            'audit' => 'array',
            'state' => OrderState::class,
        ];
    }

    public function scopeUnpaid(Builder $query): void
    {
        $query->whereNull('paid_at');
    }

    public function paid(): bool
    {
        return ! empty($this->paid_at);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }
}
