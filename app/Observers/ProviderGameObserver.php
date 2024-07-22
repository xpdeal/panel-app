<?php

namespace App\Observers;

use App\Models\ProviderGame;
use Illuminate\Support\Str;

class ProviderGameObserver
{
    public function saving(ProviderGame $game)
    {
        //  $game->slug = Str::slug($game->game.' '.$game->id.mt_rand(1000, 999999));
    }

    public function creating(ProviderGame $game)
    {
        $lastVersion = ProviderGame::query()
            ->select(['id', 'version'])
            ->orderBy('id', 'desc')
            ->first();
        if ($lastVersion) {
            $game->version = $lastVersion->version + 1;
        }

        $game->name = $game->game;

    }

    /**
     * Handle the ProviderGame "created" event.
     */
    public function created(ProviderGame $providerGame): void
    {
        //
    }

    /**
     * Handle the ProviderGame "updated" event.
     */
    public function updated(ProviderGame $providerGame): void
    {
        //
    }

    /**
     * Handle the ProviderGame "deleted" event.
     */
    public function deleted(ProviderGame $providerGame): void
    {
        //
    }

    public function deleting(ProviderGame $providerGame): void
    {
        $providerGame->slug = $providerGame->slug.'_deleted';
    }

    /**
     * Handle the ProviderGame "restored" event.
     */
    public function restored(ProviderGame $providerGame): void
    {
        //
    }

    /**
     * Handle the ProviderGame "force deleted" event.
     */
    public function forceDeleted(ProviderGame $providerGame): void
    {
        //
    }
}
