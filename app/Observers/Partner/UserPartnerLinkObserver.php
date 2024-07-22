<?php

namespace App\Observers\Partner;

use App\Models\UserPartnerLink;
use Illuminate\Support\Str;

class UserPartnerLinkObserver
{
    public function saving(UserPartnerLink $userPartnerLink): void
    {
        $userPartnerLink->slug = Str::slug($userPartnerLink->slug);
    }

    /**
     * Handle the UserPartnerLink "created" event.
     */
    public function created(UserPartnerLink $userPartnerLink): void
    {
        //
    }

    /**
     * Handle the UserPartnerLink "updated" event.
     */
    public function updated(UserPartnerLink $userPartnerLink): void
    {
        //
    }

    /**
     * Handle the UserPartnerLink "deleted" event.
     */
    public function deleted(UserPartnerLink $userPartnerLink): void
    {
        //
    }

    /**
     * Handle the UserPartnerLink "restored" event.
     */
    public function restored(UserPartnerLink $userPartnerLink): void
    {
        //
    }

    /**
     * Handle the UserPartnerLink "force deleted" event.
     */
    public function forceDeleted(UserPartnerLink $userPartnerLink): void
    {
        //
    }
}
