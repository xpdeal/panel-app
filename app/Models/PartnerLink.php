<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $active
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserPartnerLink> $userPartnerLinks
 * @property-read int|null $user_partner_links_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLink whereUrl($value)
 *
 * @mixin \Eloquent
 */
class PartnerLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'active',
        'url',
    ];

    public function userPartnerLinks(): HasMany
    {
        return $this->hasMany(UserPartnerLink::class);
    }
}
