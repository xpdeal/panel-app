<?php

namespace App\Observers\Account;

use App\Models\User;
use App\Services\User\Wallet\BootstrapWalletService;
use Illuminate\Support\Str;
use Nnjeim\World\Models\Currency;

class UserObserver
{
    /**
     * @throws \Exception
     */
    public function creating(User $user): void
    {

        $user->uuid = Str::uuid();
        $user->nickname = Str::random(16);
        if (Currency::query()->count() >= 1) {
            $user->currency_id = Currency::query()->where('code', 'BRL')->first()->id;
        } else {
            $user->currency_id = 1;
        }

    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //$user->wallet_id = BootstrapWalletService::getWallet('default')->id;
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
