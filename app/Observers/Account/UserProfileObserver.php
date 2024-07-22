<?php

namespace App\Observers\Account;

use App\Models\UserProfile;

class UserProfileObserver
{
    public function saving(UserProfile $userProfile): void {}

    /**
     * Handle the UserProfile "created" event.
     */
    public function created(UserProfile $userProfile): void
    {
        //
    }

    public function creating(UserProfile $userProfile): void
    {
        $avatars = [
            'Simon',
            'Lilly',
            'Scooter',
            'Cookie',
            'Bubba',
            'Boots',
            'Midnight',
            'Coco',
            'Sophie',
            'Charlie',
            'Sam',
        ];
        $userProfile->avatar = $avatars[array_rand($avatars)];
    }

    /**
     * Handle the UserProfile "updated" event.
     */
    public function updated(UserProfile $userProfile): void
    {
        //
    }

    /**
     * Handle the UserProfile "deleted" event.
     */
    public function deleted(UserProfile $userProfile): void
    {
        //
    }

    /**
     * Handle the UserProfile "restored" event.
     */
    public function restored(UserProfile $userProfile): void
    {
        //
    }

    /**
     * Handle the UserProfile "force deleted" event.
     */
    public function forceDeleted(UserProfile $userProfile): void
    {
        //
    }
}
