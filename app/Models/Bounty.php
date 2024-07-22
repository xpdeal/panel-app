<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string|null $uuid
 * @property int $active
 * @property int|null $bounty_id
 * @property Bounty|null $bounty
 * @property string $name
 * @property string|null $description
 * @property string|null $log
 * @property array|null $meta
 * @property string|null $available_start_at
 * @property string|null $available_end_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $event_on
 * @property string|null $walletable
 * @property int|null $repeatedly
 * @property int|null $bounty_group_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Bounty> $bounties
 * @property-read int|null $bounties_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereAvailableEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereAvailableStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereBounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereBountyGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereBountyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereEventOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereRepeatedly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty whereWalletable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Bounty withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Bounty extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'active',
        'bounty_id',
        'bounty',
        'name',
        'description',
        'log',
        'meta',
        'walletable',
        'event_on',
        'repeatedly',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function bounties(): HasMany
    {
        return $this->hasMany(Bounty::class);
    }

    public function bounty(): BelongsTo
    {
        return $this->belongsTo(Bounty::class);
    }
}
