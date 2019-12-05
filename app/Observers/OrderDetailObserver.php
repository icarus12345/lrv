<?php

namespace App\Observers;

use App\Models\Product;
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
        $order = $orderDetail->order;
        $order->caculator();
        $order->save();
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
        // if($orderDetail->qty == 0) {
        //     $orderDetail->delete();
        // } else {
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
                    $product = Product::find($orderDetail->product_id);
                    if ($product) {
                        $diffQty = $orderDetail->qty - $orderDetail->getOriginal('qty');
                        $product->instock -= $diffQty;
                        $product->save();
                    }
                }elseif($orderDetail->getOriginal('product_id') != $orderDetail->product_id){
                    // update stock
                    $product = Product::find($orderDetail->product_id);
                    if ($product) {
                        $diffQty = $orderDetail->qty;
                        $product->instock -= $diffQty;
                        $product->save();
                    }
                    $product = Product::find($orderDetail->getOriginal('product_id'));
                    if ($product) {
                        $diffQty = $orderDetail->qty;
                        $product->instock += $diffQty;
                        $product->save();
                    }
                }
            }
        // }
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function deleted(OrderDetail $orderDetail)
    {
        //
        $order = $orderDetail->order;
        if($order->order_details()->count()){

            $order->caculator();
            $order->save();
        }else{
            $order->delete();
        }

    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function restored(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function forceDeleted(OrderDetail $orderDetail)
    {
        //
    }
}
