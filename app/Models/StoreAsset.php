<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property int $id
 * @property string $asset
 * @property string|null $directory
 * @property string|null $image
 * @property array|null $meta
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset query()
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereAsset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|StoreAsset withoutTrashed()
 *
 * @mixin \Eloquent
 */
class StoreAsset extends Model implements HasMedia
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'asset',
        'meta',
        'directory',
        'image',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }
}
