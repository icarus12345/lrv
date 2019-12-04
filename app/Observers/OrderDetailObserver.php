<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderDetailObserver
{
    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updated(OrderDetail $orderDetail)
    {
        //
        $order = $orderDetail->order;
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
        if(
            $orderDetail->getOriginal('qty') != $orderDetail->qty ||
            $orderDetail->getOriginal('product_id') != $orderDetail->product_id
        ){
            // update order amount
            $order->caculator();
            $order->save();

            // check & update stock
            if(
                in_array($order->status, $avaiable) &&
                $orderDetail->getOriginal('qty') != $orderDetail->qty
            ){
                // update stock
                $product = $orderDetail->product;
                if ($product) {
                    $diffQty = $orderDetail->qty - $orderDetail->getOriginal('qty');
                    $product->instock -= $diffQty;
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
