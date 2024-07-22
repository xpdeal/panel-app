<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\MenuPositionEnum;
use App\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @method static whereNull(string $string)
 * @method static where(string $string, true $true)
 *
 * @property int $id
 * @property bool $active
 * @property int|null $menu_id
 * @property-read string|null $icon
 * @property string|null $route
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $slug
 * @property string|null $name
 * @property MenuPositionEnum|null $position
 * @property int $ordered
 * @property bool|null $featured
 * @property string|null $iconable_type
 * @property string|null $iconable_id
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read Menu|null $menu
 * @property-read Collection<int, Menu> $menus
 * @property-read int|null $menus_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIconableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIconableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereOrdered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu withoutTrashed()
 *
 * @property int|null $category_id
 * @property-read \App\Models\Category|null $category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCategoryId($value)
 *
 * @mixin \Eloquent
 */
#[ObservedBy([MenuObserver::class])]
class Menu extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'menu_id',
        'icon',
        'name',
        'route',
        'slug',
        'ordered',
        'position',
        'featured',
        'iconable_id',
        'iconable_type',
        'category_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'featured' => 'boolean',
        'position' => MenuPositionEnum::class,
    ];

    public function icon(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value) {
                if (! empty($this->iconable_id)) {
                    return $this->iconable_id;
                }

                return $value ?: 'tag';
            }
        );
    }

    public function route(): Attribute
    {

      return Attribute::make(
            get: function (mixed $value) {
               return 'home';
            }
        );
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
