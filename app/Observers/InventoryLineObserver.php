<?php

namespace App\Observers;

use \App\Models\InventoryLine;
use \App\Models\Inventory;
// use \App\Models\Product;

class InventoryLineObserver
{
    /**
     * Handle the inventory line "created" event.
     *
     * @param  \App\App\Models\InventoryLine  $inventoryLine
     * @return void
     */
    public function created(InventoryLine $inventoryLine)
    {
        //
        $inventory = Inventory::firstOrCreate([
            'product_id' => $inventoryLine->product_id,
            'warehouse_id' => $inventoryLine->warehouse_id,
            ]);
        $inventory->qty+=$inventoryLine->qty;
        $inventory->save();
        $product=$inventoryLine->product;
        $product->instock+=$inventoryLine->qty;
        $product->save();
    }

    /**
     * Handle the inventory line "updated" event.
     *
     * @param  \App\App\Models\InventoryLine  $inventoryLine
     * @return void
     */
    public function updated(InventoryLine $inventoryLine)
    {
        //
    }

    /**
     * Handle the inventory line "deleted" event.
     *
     * @param  \App\App\Models\InventoryLine  $inventoryLine
     * @return void
     */
    public function deleted(InventoryLine $inventoryLine)
    {
        //
    }

    /**
     * Handle the inventory line "restored" event.
     *
     * @param  \App\App\Models\InventoryLine  $inventoryLine
     * @return void
     */
    public function restored(InventoryLine $inventoryLine)
    {
        //
    }

    /**
     * Handle the inventory line "force deleted" event.
     *
     * @param  \App\App\Models\InventoryLine  $inventoryLine
     * @return void
     */
    public function forceDeleted(InventoryLine $inventoryLine)
    {
        //
    }
}
