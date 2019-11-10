<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
        $avaiable = [
            'Approved',
            'Unpaid',
            'Paid',
            'Shipping',
            'Done',
        ];
        $unavaiable = [
            'Requested',
            'Canceled',
        ];
        if($order->getOriginal('status') != $order->status){
            if(
                in_array($order->getOriginal('status'), $unavaiable) &&
                in_array($order->status, $avaiable)
            ){
                // update stock
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    $product->instock-=$detail->qty;
                    $product->save();
                }
            } else if(
                in_array($order->getOriginal('status'), $avaiable) &&
                in_array($order->status, $unavaiable)
            ){
                // restore stock
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    $product->instock+=$detail->qty;
                    $product->save();
                }
            }
        }
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
        $order->order_details()->delete();
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
