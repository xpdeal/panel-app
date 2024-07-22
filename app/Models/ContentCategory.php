<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $active
 * @property string $slug
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Content> $contents
 * @property-read int|null $contents_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContentCategory withoutTrashed()
 *
 * @mixin \Eloquent
 */
class ContentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'active',
        'slug',
    ];

    public function contents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Content::class);
    }
}
