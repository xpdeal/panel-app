<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static updateOrCreate(array $array, array $data)
 *
 * @property int $id
 * @property string $uri
 * @property string|null $name
 * @property string|null $prefix
 * @property string|null $group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $action
 * @property bool $listed
 * @property string|null $method
 * @property string|null $description
 * @property string|null $category
 * @property array|null $meta
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Uri newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uri newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Uri query()
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereListed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Uri whereUri($value)
 *
 * @mixin \Eloquent
 */
class Uri extends Model
{
    use HasFactory;

    protected $fillable = [
        'uri',
        'name',
        'prefix',
        'group',
        'method',
        'action',
        'listed',
        'description',
        'category',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
        'listed' => 'boolean',
    ];
}
