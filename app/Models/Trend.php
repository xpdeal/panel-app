<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $date
 * @property string $trend
 * @property string $description
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $trend_value
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Trend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Trend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereTrend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereTrendValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Trend whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Trend extends Model
{
    use HasFactory;

    protected $fillable = [
        'trend',
        'description',
        'data',
        'trend_value',
        'date',
    ];

    protected $casts = [
        'data' => 'array',
        'date' => 'date',
    ];

    public function getTrendValueAttribute()
    {
        if (empty($this->trend_value)) {
            return 0;
        }

        return $this->trend_value;
    }
}
