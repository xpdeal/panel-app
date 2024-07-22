<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\ContentBlockObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @property string $slug
 * @property string $title
 * @property int $id
 * @property bool $active
 * @property string|null $subtitle
 * @property string|null $block
 * @property string|null $image
 * @property array|null $meta
 * @property string|null $action
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $content_id
 * @property-read \App\Models\Content|null $content
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentBlock withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy([ContentBlockObserver::class])]
class ContentBlock extends Model implements HasMedia
{
    use HasFactory, SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'active',
        'title',
        'subtitle',
        'block',
        'image',
        'meta',
        'action',
        'content_id',
        'slug',
    ];

    protected $casts = [
        'active' => 'boolean',
        'meta' => 'array',
    ];

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
