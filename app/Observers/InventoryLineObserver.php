<?php

namespace App\Observers;

use \App\Models\InventoryLine;
use \App\Models\Inventory;
use \App\Models\Product;

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
        if ($product) {
            $product->instock+=$inventoryLine->qty;
            $product->save();
        }
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
        

        if (
            $inventoryLine->getOriginal('warehouse_id') != $inventoryLine->warehouse_id ||
            $inventoryLine->getOriginal('product_id') != $inventoryLine->product_id
            ) {
            $inventory = Inventory::firstOrCreate([
                'product_id' => $inventoryLine->product_id,
                'warehouse_id' => $inventoryLine->warehouse_id,
                ]);
            $inventory->qty += $inventoryLine->qty;
            $inventory->save();
            $product=$inventoryLine->product;
            if ($product) {

                $product->instock += $inventory->qty;
                $product->save();
            }

            $oldInventory = Inventory::firstOrCreate([
                'product_id' => $inventoryLine->getOriginal('product_id'),
                'warehouse_id' => $inventoryLine->getOriginal('warehouse_id'),
                ]);
            $oldInventory->qty -= $inventoryLine->getOriginal('qty');
            $oldInventory->save();

            $product=Product::find($inventoryLine->getOriginal('product_id'));
            if ($product) {
                $product->instock -= $inventoryLine->getOriginal('qty');
                $product->save();
            }
        }else if ($inventoryLine->getOriginal('qty') != $inventoryLine->qty) {
            // 2-5 = + 3
            $diffQty = $inventoryLine->qty - $inventoryLine->getOriginal('qty');
            $product=$inventoryLine->product;
            if ($product) {
                $product->instock += $diffQty;
                $product->save();
            }
        }
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
