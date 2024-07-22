<?php

namespace App\Models;

use App\Observers\Account\UserProfileObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Nnjeim\World\Models\Country;
use Nnjeim\World\Models\Currency;

/**
 * @property int $id
 * @property int $user_id
 * @property string $profile_key
 * @property string $profile_value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereProfileKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereProfileValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserProfile withoutTrashed()
 *
 * @property string|null $verified_at
 * @property string|null $tax_id
 * @property int|null $tax_type_id
 * @property int|null $country_id
 * @property int|null $currency_id
 * @property string|null $phone_number
 * @property string|null $avatar
 * @property-read Country|null $country
 * @property-read Currency|null $currency
 * @property Carbon|mixed|null $birthdate
 *
 * @method static Builder|UserProfile verified()
 * @method static Builder|UserProfile whereAvatar($value)
 * @method static Builder|UserProfile whereCountryId($value)
 * @method static Builder|UserProfile whereCurrencyId($value)
 * @method static Builder|UserProfile wherePhoneNumber($value)
 * @method static Builder|UserProfile whereTaxId($value)
 * @method static Builder|UserProfile whereTaxTypeId($value)
 * @method static Builder|UserProfile whereVerifiedAt($value)
 *
 * @property string|null $address
 *
 * @method static Builder|UserProfile whereAddress($value)
 * @method static Builder|UserProfile whereBirthdate($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy(UserProfileObserver::class)]
class UserProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'country_id',
        'currency_id',
        'tax_id',
        'tax_type_id',
        'verified_at',
        'phone_number',
        'avatar',
        'birthdate',
        'address',
    ];

    protected $casts = [
        'birthdate' => 'date:Y-m-d',
    ];

    public function scopeVerified(Builder $query): Builder
    {
        return $query->whereNotNull('verified_at');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
