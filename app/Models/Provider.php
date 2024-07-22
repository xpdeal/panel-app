<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property string $provider
 * @property string $slug
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $name
 * @property int|null $featured
 * @property int|null $choices
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProviderGame> $games
 * @property-read int|null $games_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider withoutTrashed()
 *
 * @property-read \App\Models\ProviderConfig|null $providerConfig
 *
 * @mixin \Eloquent
 */
class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'provider',
        'slug',
        'icon',
        'name',
        'choices',
        'featured',
        'provider_config_id',
    ];

    public function games(): HasMany
    {
        return $this->hasMany(ProviderGame::class);
    }

    public function providerConfig(): HasOne
    {
        return $this->hasOne(ProviderConfig::class);
    }
}
