<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Frontend\PositionEnum;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @method static where(string $string, string $value)
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $route
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $image
 * @property PositionEnum|null $position
 *
 * @method static Builder|Banner newModelQuery()
 * @method static Builder|Banner newQuery()
 * @method static Builder|Banner onlyTrashed()
 * @method static Builder|Banner query()
 * @method static Builder|Banner whereCreatedAt($value)
 * @method static Builder|Banner whereDeletedAt($value)
 * @method static Builder|Banner whereId($value)
 * @method static Builder|Banner whereImage($value)
 * @method static Builder|Banner wherePosition($value)
 * @method static Builder|Banner whereRoute($value)
 * @method static Builder|Banner whereSubtitle($value)
 * @method static Builder|Banner whereTitle($value)
 * @method static Builder|Banner whereUpdatedAt($value)
 * @method static Builder|Banner withTrashed()
 * @method static Builder|Banner withoutTrashed()
 *
 * @property string|null $mobile_image
 *
 * @method static Builder|Banner whereMobileImage($value)
 *
 * @mixin Eloquent
 */
class Banner extends Model
{
    use HasFactory, SoftDeletes;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'subtitle',
        'route',
        'image',
        'mobile_image',
        'position',
    ];

    protected $casts = [
        'position' => PositionEnum::class,
    ];
}
