<?php

namespace App\Observers;

use App\Models\ContentBlock;
use Illuminate\Support\Str;

class ContentBlockObserver
{
    public function saving(ContentBlock $contentBlock): void
    {
        $contentBlock->slug = Str::slug($contentBlock->title);
    }

    /**
     * Handle the ContentBlock "created" event.
     */
    public function created(ContentBlock $contentBlock): void
    {
        //
    }

    /**
     * Handle the ContentBlock "updated" event.
     */
    public function updated(ContentBlock $contentBlock): void
    {
        //
    }

    /**
     * Handle the ContentBlock "deleted" event.
     */
    public function deleted(ContentBlock $contentBlock): void
    {
        //
    }

    /**
     * Handle the ContentBlock "restored" event.
     */
    public function restored(ContentBlock $contentBlock): void
    {
        //
    }

    /**
     * Handle the ContentBlock "force deleted" event.
     */
    public function forceDeleted(ContentBlock $contentBlock): void
    {
        //
    }
}
