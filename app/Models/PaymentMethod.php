<?php

declare(strict_types=1);

namespace App\Models;

use Bavix\Wallet\Services\FormatterServiceInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $active
 * @property string $method
 * @property string $slug
 * @property string|null $icon
 * @property array|null $countries
 * @property string $amount_min
 * @property string $amount_max
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAmountMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereAmountMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCountries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'active',
        'method',
        'slug',
        'icon',
        'countries',
        'amount_min',
        'amount_max',
    ];

    protected $casts = [
        'active' => 'boolean',
        'countries' => 'array',
    ];

    protected function amountMin(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app(FormatterServiceInterface::class)->floatValue($value, 8),
            set: fn (string $value) => app(FormatterServiceInterface::class)->intValue($value, 8),
        );
    }

    protected function amountMax(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app(FormatterServiceInterface::class)->floatValue($value, 8),
            set: fn (string $value) => app(FormatterServiceInterface::class)->intValue($value, 8),
        );
    }
}
