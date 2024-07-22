<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\InvoiceObserver;
use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Interfaces\ProductInterface;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @method static create(array $array)
 * @method static find(int $invoiceId)
 * @method static where(string $string, mixed $user_id)
 *
 * @property int $id
 * @property int $user_id
 * @property int $amount
 * @property int $precision
 * @property string $title
 * @property string $description
 * @property string $action
 * @property array $meta
 * @property User $user
 * @property Wallet $wallet
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $invoiceable_type
 * @property int $invoiceable_id
 * @property string|null $providerable_type
 * @property string|null $providerable_id
 * @property int|null $wallet_id
 * @property-read string $balance
 * @property-read int $balance_int
 * @property-read Collection<int, \Bavix\Wallet\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property bool $touchable
 * @property Carbon|null $confirmed_at
 * @property array $data
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereInvoiceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice wherePrecision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProviderableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereProviderableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereWalletId($value)
 *
 * @property string|null $log
 * @property int|null $spent_id
 * @property mixed $cash_in
 * @property mixed $cash_out
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereSpentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTouchable($value)
 *
 * @property int|null $transaction_id
 * @property-read mixed $ggr
 * @property-read \App\Models\ProviderGame|null $providerGame
 * @property-read mixed $win
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCashIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereCashOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invoice whereTransactionId($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([InvoiceObserver::class])]
class Invoice extends Model implements ProductInterface
{
    use HasWallet;

    protected $fillable = [
        'user_id',
        'cash_in',
        'cash_out',
        'title',
        'amount',
        'meta',
        'precision',
        'invoiceable_type',
        'invoiceable_id',
        'action',
        'providerable_type',
        'providerable_id',
        'wallet_id',
        'touchable',
        'confirmed_at',
        'log',
        'spent_id',

    ];

    protected $casts = [
        'meta' => 'array',
        'confirmed_at' => 'datetime',
        'cash_in' => 'integer',
        'cash_out' => 'integer',
    ];

    protected $appends = ['ggr', 'win'];

    protected function ggr(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['cash_in'] - $attributes['cash_out']
        );
    }

    protected function win(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['cash_out'] > 0
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function getAmountProduct(Customer $customer): int|string
    {
        return $this->amount;
    }

    public function getMetaProduct(): ?array
    {
        return [
            'title' => $this->title,
            'description' => 'wallet.debit.amount',
            'invoice_id' => $this->id,
        ];
    }

    public function providerGame(): BelongsTo
    {
        return $this->belongsTo(ProviderGame::class, 'invoiceable_id', 'identifier');
    }
}
