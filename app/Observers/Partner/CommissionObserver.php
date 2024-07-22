<?php

namespace App\Observers\Partner;

use App\Models\Commission;
use App\Models\User;

class CommissionObserver
{
    public function getAmountDeposit($amount)
    {
        if ($amount > 0) {
            return $amount;
        }

        return $amount * -1;
    }

    public function creating(Commission $commission)
    {
        $wallet = User::find($commission->user_id);

        if (! $wallet->hasWallet('affiliate')) {
            $wallet->createWallet(
                [
                    'name' => 'affiliate',
                    'slug' => 'affiliate',
                ]
            );
        }

        $walletPay = $wallet->getWallet('affiliate');

        if ($commission->amount > 0) {
            $transaction = $walletPay->depositFloat($commission->amount, [
                'origin' => $commission->slug,
                'description' => $commission->slug.'_deposit',
            ]);
        } else {
            $transaction = $walletPay->forceWithdraw($this->getAmountDeposit($commission->amount), [
                'origin' => $commission->slug,
                'description' => $commission->slug.'_withdraw',
            ]);
        }

        $commission->transaction_id = $transaction->id;
        $commission->paid_at = now();

    }

    /**
     * Handle the Commission "created" event.
     */
    public function created(Commission $commission): void
    {
        //
    }

    /**
     * Handle the Commission "updated" event.
     */
    public function updated(Commission $commission): void
    {
        //
    }

    /**
     * Handle the Commission "deleted" event.
     */
    public function deleted(Commission $commission): void
    {
        //
    }

    /**
     * Handle the Commission "restored" event.
     */
    public function restored(Commission $commission): void
    {
        //
    }

    /**
     * Handle the Commission "force deleted" event.
     */
    public function forceDeleted(Commission $commission): void
    {
        //
    }
}
