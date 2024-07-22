<?php

namespace App\Models;

/**
 * @property int $id
 * @property int $from_id
 * @property int $to_id
 * @property string $status
 * @property string|null $status_last
 * @property int $deposit_id
 * @property int $withdraw_id
 * @property string $discount
 * @property string $fee
 * @property array|null $extra
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Bavix\Wallet\Models\Transaction $deposit
 * @property-read \Bavix\Wallet\Models\Wallet|null $from
 * @property-read \Bavix\Wallet\Models\Wallet|null $to
 * @property-read \Bavix\Wallet\Models\Transaction $withdraw
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereDepositId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereExtra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereStatusLast($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer whereWithdrawId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transfer withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Transfer extends \Bavix\Wallet\Models\Transfer {}
