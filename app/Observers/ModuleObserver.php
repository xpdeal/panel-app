<?php

namespace App\Observers;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleObserver
{
    public function creating(Module $module)
    {
        $module->uuid = Str::uuid();
        $module->slug = Str::slug($module->name);
    }

    /**
     * Handle the Module "created" event.
     */
    public function created(Module $module): void
    {
        //
    }

    /**
     * Handle the Module "updated" event.
     */
    public function updated(Module $module): void
    {
        //
    }

    /**
     * Handle the Module "deleted" event.
     */
    public function deleted(Module $module): void
    {
        //
    }

    /**
     * Handle the Module "restored" event.
     */
    public function restored(Module $module): void
    {
        //
    }

    /**
     * Handle the Module "force deleted" event.
     */
    public function forceDeleted(Module $module): void
    {
        //
    }
}
