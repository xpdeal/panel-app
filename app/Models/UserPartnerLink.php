<?php

namespace App\Models;

use App\Observers\Partner\UserPartnerLinkObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $id)
 *
 * @property int $id
 * @property int $user_id
 * @property string $slug
 * @property int $hits
 * @property string $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $active
 * @property int|null $partner_link_id
 * @property-read \App\Models\PartnerLink|null $partnerLink
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink wherePartnerLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPartnerLink withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy(UserPartnerLinkObserver::class)]
class UserPartnerLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'slug',
        'active',
        'hits',
        'score',
        'partner_link_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function partnerLink(): BelongsTo
    {
        return $this->belongsTo(PartnerLink::class);
    }
}
