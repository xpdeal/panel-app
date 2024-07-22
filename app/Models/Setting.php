<?php

namespace App\Models;

use App\Services\Helper\CastService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static where(string $string, false $false)
 *
 * @property mixed $setting_key
 * @property array $meta
 * @property int $id
 * @property string|null $setting_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $active
 * @property string|null $section
 * @property int $is_private
 * @property-read mixed|null $value
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSettingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting withoutTrashed()
 *
 * @property string|null $cast
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCast($value)
 *
 * @mixin \Eloquent
 */
class Setting extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'setting_key',
        'setting_value',
        'meta',
        'active',
        'section',
        'is_private',
        'cast',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    protected function settingValue(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return CastService::autoCast($value);
            },
            set: function (string $value) {
                return CastService::autoCast($value);
            },
        );
    }
}
