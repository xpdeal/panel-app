<?php

namespace App\Observers;

use App\Models\Bounty;
use Illuminate\Support\Str;

class BountyObserver
{
    public function creating(Bounty $bounty): void
    {
        $bounty->uuid = Str::uuid();
    }

    /**
     * Handle the Bounty "created" event.
     */
    public function created(Bounty $bounty): void {}

    /**
     * Handle the Bounty "updated" event.
     */
    public function updated(Bounty $bounty): void
    {
        //
    }

    /**
     * Handle the Bounty "deleted" event.
     */
    public function deleted(Bounty $bounty): void
    {
        //
    }

    /**
     * Handle the Bounty "restored" event.
     */
    public function restored(Bounty $bounty): void
    {
        //
    }

    /**
     * Handle the Bounty "force deleted" event.
     */
    public function forceDeleted(Bounty $bounty): void
    {
        //
    }
}
