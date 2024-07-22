<?php

namespace App\Models;

/**
 * @property int $id
 * @property string $holder_type
 * @property int $holder_id
 * @property string $name
 * @property string $slug
 * @property string $uuid
 * @property string|null $description
 * @property array|null $meta
 * @property string $balance
 * @property int $decimal_places
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string|int|float $available_balance
 * @property-read string $balance_float
 * @property-read float $balance_float_num
 * @property-read int $balance_int
 * @property-read string $credit
 * @property-read string $currency
 * @property-read string $original_balance
 * @property-read \Bavix\Wallet\Models\Wallet|null $wallet
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $holder
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $receivedTransfers
 * @property-read int|null $received_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transfer> $transfers
 * @property-read int|null $transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Bavix\Wallet\Models\Transaction> $walletTransactions
 * @property-read int|null $wallet_transactions_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDecimalPlaces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereHolderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereHolderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Wallet extends \Bavix\Wallet\Models\Wallet {}
