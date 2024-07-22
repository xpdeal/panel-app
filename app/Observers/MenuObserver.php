<?php

namespace App\Observers;

use App\Models\Menu;
use Illuminate\Support\Str;

class MenuObserver
{
    public function getMenuId(mixed $menuId)
    {
        if (empty($menuId) || $menuId == '0') {
            return null;
        }

        return (int) $menuId;
    }

    public function creating(Menu $menu): void
    {
        $menu->slug = Str::slug($menu->name);
        $menu->menu_id = $this->getMenuId($menu->menu_id);
    }

    /**
     * Handle the Menu "created" event.
     */
    public function created(Menu $menu): void
    {
        //
    }

    /**
     * Handle the Menu "updated" event.
     */
    public function updated(Menu $menu): void
    {
        //
    }

    public function deleting(Menu $menu): void
    {
        $menu->slug = 'DELETED_'.$menu->slug;
    }

    /**
     * Handle the Menu "deleted" event.
     */
    public function deleted(Menu $menu): void
    {
        $menu->slug = 'DELETED_'.$menu->slug;
    }

    /**
     * Handle the Menu "restored" event.
     */
    public function restored(Menu $menu): void
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     */
    public function forceDeleted(Menu $menu): void
    {
        //
    }
}
