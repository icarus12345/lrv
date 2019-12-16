<?php

namespace App\Observers;

use App\Models\InventoryHeader;

class InventoryHeaderObserver
{
    /**
     * Handle the inventory header "created" event.
     *
     * @param  \App\App\Models\InventoryHeader  $inventoryHeader
     * @return void
     */
    public function created(InventoryHeader $inventoryHeader)
    {
        //
    }
    public function creating(InventoryHeader $inventoryHeader)
    {
        //
        $inventoryHeader->created_by = \Auth::guard('admin')->user()->id;
    }

    /**
     * Handle the inventory header "updated" event.
     *
     * @param  \App\App\Models\InventoryHeader  $inventoryHeader
     * @return void
     */
    public function updated(InventoryHeader $inventoryHeader)
    {
        //
    }

    /**
     * Handle the inventory header "deleted" event.
     *
     * @param  \App\App\Models\InventoryHeader  $inventoryHeader
     * @return void
     */
    public function deleted(InventoryHeader $inventoryHeader)
    {
        //
    }

    /**
     * Handle the inventory header "restored" event.
     *
     * @param  \App\App\Models\InventoryHeader  $inventoryHeader
     * @return void
     */
    public function restored(InventoryHeader $inventoryHeader)
    {
        //
    }

    /**
     * Handle the inventory header "force deleted" event.
     *
     * @param  \App\App\Models\InventoryHeader  $inventoryHeader
     * @return void
     */
    public function forceDeleted(InventoryHeader $inventoryHeader)
    {
        //
    }
}
