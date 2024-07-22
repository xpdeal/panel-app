<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $charge
 * @property int $tax
 * @property int $id
 * @property int $provider_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read int $cost
 * @property-read \App\Models\Provider|null $provider
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderConfig withoutTrashed()
 *
 * @mixin \Eloquent
 */
class ProviderConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'charge',
        'tax',
    ];

    protected $appends = ['cost'];

    protected $hidden = [
        'charge',
        'tax',
    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function getCostAttribute(): int
    {
        return (int) $this->charge + $this->tax;
    }
}
