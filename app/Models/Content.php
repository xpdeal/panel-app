<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $active
 * @property string|null $content
 * @property int|null $content_category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, ContentBlock> $contentBlocks
 * @property-read int|null $content_blocks_count
 * @property-read ContentCategory|null $contentCategory
 *
 * @method static Builder|Content newModelQuery()
 * @method static Builder|Content newQuery()
 * @method static Builder|Content onlyTrashed()
 * @method static Builder|Content query()
 * @method static Builder|Content whereActive($value)
 * @method static Builder|Content whereContent($value)
 * @method static Builder|Content whereContentCategoryId($value)
 * @method static Builder|Content whereCreatedAt($value)
 * @method static Builder|Content whereDeletedAt($value)
 * @method static Builder|Content whereId($value)
 * @method static Builder|Content whereUpdatedAt($value)
 * @method static Builder|Content withTrashed()
 * @method static Builder|Content withoutTrashed()
 *
 * @mixin Eloquent
 */
class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'active',
        'content_category_id',
        'content',
    ];

    public function contentCategory(): BelongsTo
    {
        return $this->belongsTo(ContentCategory::class);
    }

    public function contentBlocks(): HasMany
    {
        return $this->hasMany(ContentBlock::class);
    }
}
