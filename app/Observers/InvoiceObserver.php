<?php

namespace App\Observers;

use App\Jobs\InvoiceProcessJob;
use App\Models\Invoice;
use App\Services\Bounty\RevenueShareBountyService;

class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        InvoiceProcessJob::dispatch($invoice)
            ->onQueue('default');
        /*
        if ($invoice->action == 'WIN') {
            $bet = Invoice::where('providerable_id', $invoice->providerable_id)
                ->where('action', 'BET')
                ->orderBy('id', 'desc')
                ->first();

            if ($bet) {

                $betAmount = $bet->meta['bet'];
                $winAmount = $invoice->meta['win'];

                $windLose = $betAmount - $winAmount;

                RevenueShareBountyService::pay($invoice->user_id, $windLose, 1);
            }

        }

        if ($invoice->action == 'spin') {

            $betAmount = $invoice->meta['bet'];
            $winAmount = $invoice->meta['win'];

            $windLose = $betAmount - $winAmount;

            RevenueShareBountyService::pay($invoice->user_id, $windLose, 1);
        }

        if ($invoice->action == 'reSpin') {

            $betAmount = 0;
            if ($invoice->meta['win'] > 0) {
                $winAmount = $invoice->meta['win'];
                $windLose = $betAmount - $winAmount;
                RevenueShareBountyService::pay($invoice->user_id, $windLose, 1);
            }

        }*/

    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
