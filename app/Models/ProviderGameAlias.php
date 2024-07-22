<?php

declare(strict_types=1);

namespace App\Models;

use App\Observers\Panel\ProviderGameAliasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $slug
 * @property string $name
 * @property int $hits
 * @property bool $active
 * @property int $id
 * @property int $provider_game_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\ProviderGame|null $providerGame
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereProviderGameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProviderGameAlias withoutTrashed()
 *
 * @mixin \Eloquent
 */
#[ObservedBy(ProviderGameAliasObserver::class)]
class ProviderGameAlias extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'provider_game_id',
        'name',
        'slug',
        'hits',
        'active',
    ];

    protected $casts = [
        'hits' => 'integer',
        'active' => 'boolean',
    ];

    public function providerGame(): BelongsTo
    {
        return $this->belongsTo(ProviderGame::class);
    }
}
