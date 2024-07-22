<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\ProviderGameObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
use Laravel\Scout\Searchable;

/**
 * @method static updateOrCreate(array $array, array $array)
 * @method static where(string $string, string $slug)
 * @method static whereNull(string $string)
 *
 * @property string $thumbnail
 * @property string $cover
 * @property string $slug
 * @property string $game
 * @property int $id
 * @property int $active
 * @property int $provider_id
 * @property string|null $identifier
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int|null $featured
 * @property int|null $choices
 * @property array|null $meta
 * @property array|null $tags
 * @property-read Provider|null $provider
 * @property ProviderGame|null providerGameAliases()
 * @property \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|int|mixed $version
 * @property mixed|string $name
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereChoices($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereGame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereIdentifier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame withoutTrashed()
 *
 * @property array|null $seo
 * @property int|null $touchable
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProviderGameAlias> $providerGameAliases
 * @property-read int|null $provider_game_aliases_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame freeSpins()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereSeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereTouchable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGame whereVersion($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([ProviderGameObserver::class])]
class ProviderGame extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'provider_id',
        'thumbnail',
        'game',
        'cover',
        'identifier',
        'slug',
        'choices',
        'featured',
        'meta',
        'tags',
        'seo',
        'touchable',
        'name',
        'version',
        'description',
    ];

    protected $casts = [
        'meta' => 'array',
        'tags' => 'array',
        'seo' => 'array',
        'identifier' => 'integer',
        'active' => 'boolean',
        'choices' => 'boolean',
        'featured' => 'boolean',
    ];

    /**
     * Return Cover Image if exist (Command games:images)
     */
    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                if (empty($this->thumbnail)) {
                    return $value;
                }

                return $attributes['cover'];
            }
        );
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the name of the index associated with the model.
     */
    public function searchableAs(): string
    {
        return 'game';
    }

    /**
     * Get the value used to index the model.
     */
    public function getScoutKey(): string
    {
        return $this->slug;
    }

    /**
     * Get the key name used to index the model.
     */
    public function getScoutKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    #[SearchUsingPrefix(['id', 'slug'])]
    #[SearchUsingFullText(['game'])]
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'game' => $this->game,
            'slug' => $this->slug,
        ];
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function scopeFreeSpins(Builder $query)
    {
        return $query->where('meta.bm', 1);
    }

    public function providerGameAliases(): HasMany
    {
        return $this->hasMany(ProviderGameAlias::class);
    }
}
