<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $cover
 * @property string|null $voucher
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserPromo> $userPromo
 * @property-read int|null $user_promo_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereVoucher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Promo extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'active',
        'name',
        'description',
        'content',
        'slug',
        'cover',
        'voucher',
    ];

    public function userPromo(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserPromo::class);
    }
}
