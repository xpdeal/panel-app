<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, array|bool|string|null $argument)
 *
 * @property int $id
 * @property string $lang
 * @property string $tag
 * @property string $translation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 *
 * @property string $code
 * @property string $name
 * @property string $name_native
 * @property string $dir
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereNameNative($value)
 *
 * @mixin \Eloquent
 */
class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang',
        'tag',
        'translation',
    ];
}
