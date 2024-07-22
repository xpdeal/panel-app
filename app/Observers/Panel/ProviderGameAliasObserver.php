<?php

namespace App\Observers\Panel;

use App\Models\ProviderGameAlias;
use Illuminate\Support\Str;

class ProviderGameAliasObserver
{
    public function saving(ProviderGameAlias $providerGameAlias): void
    {
        $providerGameAlias->slug = Str::slug($providerGameAlias->name);
    }

    /**
     * Handle the ProviderGameAlias "created" event.
     */
    public function created(ProviderGameAlias $providerGameAlias): void
    {
        //
    }

    /**
     * Handle the ProviderGameAlias "updated" event.
     */
    public function updated(ProviderGameAlias $providerGameAlias): void
    {
        //
    }

    /**
     * Handle the ProviderGameAlias "deleted" event.
     */
    public function deleted(ProviderGameAlias $providerGameAlias): void
    {
        //
    }

    /**
     * Handle the ProviderGameAlias "restored" event.
     */
    public function restored(ProviderGameAlias $providerGameAlias): void
    {
        //
    }

    /**
     * Handle the ProviderGameAlias "force deleted" event.
     */
    public function forceDeleted(ProviderGameAlias $providerGameAlias): void
    {
        //
    }
}
