<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\Partner\CommissionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @method static create(array $array)
 *
 * @property int $id
 * @property bool $active
 * @property string $commissionable_type
 * @property int $commissionable_id
 * @property string $amount
 * @property int|null $user_id
 * @property int|null $transaction_id
 * @property string|null $paid_at
 * @property array|null $logs
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Transaction|null $transaction
 * @property-read User|null $user
 * @property string $slug
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereCommissionableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereCommissionableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereLogs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commission whereUserId($value)
 *
 * @property array|null $meta
 * @property bool $qualified
 * @property int|null $commission_id
 * @property int $level
 * @property-read Model|\Eloquent $invoiceable
 *
 * @method static Builder|Commission notQualified()
 * @method static Builder|Commission whereCommissionId($value)
 * @method static Builder|Commission whereLevel($value)
 * @method static Builder|Commission whereMeta($value)
 * @method static Builder|Commission whereQualified($value)
 * @method static Builder|Commission whereSlug($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([CommissionObserver::class])]
class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'user_id',
        'commissionable_type', //rev
        'commissionable_id', //id de onde veio o rev
        'amount',
        'transaction_id',
        'paid_at',
        'logs',
        'level',
        'meta',
        'commission_id',
        'qualified',
        'slug',
    ];

    protected $casts = [
        'active' => 'boolean',
        'qualified' => 'boolean',
        'logs' => 'array',
        'meta' => 'array',
    ];

    public function scopeNotQualified(Builder $query): void
    {
        $query->where('qualified', false);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function invoiceable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo(Invoice::class, 'commissionable_type', 'commissionable_id');
    }
}
