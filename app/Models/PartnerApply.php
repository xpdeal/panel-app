<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property bool $active
 * @property string $step
 * @property string|null $description
 * @property string|null $about
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerApply withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PartnerApply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'about',
        'meta',
        'step',
        'active',
    ];

    protected $casts = [
        'meta' => 'array',
        'active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
