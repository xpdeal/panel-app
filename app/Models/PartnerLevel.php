<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property bool $active
 * @property string|null $icon
 * @property string $level
 * @property string $slug
 * @property string|null $description
 * @property string $target
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerLevel withoutTrashed()
 *
 * @mixin \Eloquent
 */
class PartnerLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'active',
        'icon',
        'level',
        'slug',
        'description',
        'target',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}
