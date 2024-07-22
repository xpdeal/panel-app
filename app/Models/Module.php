<?php

namespace App\Models;

use App\Observers\ModuleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ModuleObserver::class])]
/**
 * @property int $id
 * @property string $uuid
 * @property int $active
 * @property string $name
 * @property string $slug
 * @property string $module_category
 * @property string|null $moduleable_type
 * @property string|null $moduleable_id
 * @property array|null $configs
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Model|\Eloquent $moduleable
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereConfigs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Module withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Module extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'active',
        'name',
        'slug',
        'module_category',
        'configs',
        'moduleable_type',
        'moduleable_id',

    ];

    protected $casts = [
        'configs' => 'array',
    ];

    public function moduleable(): MorphTo
    {
        return $this->morphTo();
    }
}
