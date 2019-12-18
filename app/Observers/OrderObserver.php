<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderHistory;

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
            Order::STATUS_APPROVED,
            Order::STATUS_UNPAID,
            Order::STATUS_PAID,
            Order::STATUS_SHIPPING,
            Order::STATUS_DONE,
        ];
        $unavaiable = [
            Order::STATUS_REQUESTED,
            Order::STATUS_CANCELED,
        ];
        if($order->getOriginal('status') != $order->status){
            if(
                in_array($order->getOriginal('status'), $unavaiable) &&
                in_array($order->status, $avaiable)
            ){
                // update stock
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    if ($product) {
                        // $product->instock-=$detail->qty;
                        // $product->save();
                    }
                }
            } else if(
                in_array($order->getOriginal('status'), $avaiable) &&
                in_array($order->status, $unavaiable)
            ){
                // restore stock
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    if ($product) {
                        // $product->instock+=$detail->qty;
                        // $product->save();
                    }
                }
            }
            if(
                $order->status == Order::STATUS_DONE
            ){
                // update sold
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    if ($product) {
                        $product->sold+=$detail->qty;
                        $product->save();
                    }
                }
            }
            if(
                $order->getOriginal('status') == Order::STATUS_DONE
            ){
                // update sold
                foreach ($order->order_details as $detail) {
                    $product = $detail->product;
                    if ($product) {
                        $product->sold-=$detail->qty;
                        $product->save();
                    }
                }
            }
            $admin = \Auth::guard('admin')->user();
            switch($order->status){

                case Order::STATUS_APPROVED:
                    $message = "Approved by {$admin->name}.";
                    break;
                case Order::STATUS_UNPAID:
                    $message = "{$admin->name} changed status to Unpaid.";
                    break;
                case Order::STATUS_PAID:
                    $message = "{$admin->name} changed status to Paid.";
                    break;
                case Order::STATUS_SHIPPING:
                    $message = "{$admin->name} changed status to Shipping.";
                    break;
                case Order::STATUS_DONE:
                    $message = "{$admin->name} changed status to Done.";
                    break;
                case Order::STATUS_CANCELED:
                    $message = "Canceled by {$admin->name}.";
                    break;
                case Order::STATUS_REQUESTED:
                    $message = "{$admin->name} changed status to Requested.";
                    break;

                default:
                    $message = "Unknown";
            }

            OrderHistory::create([
                'created_by' => $admin->id,
                'header_id' => $order->id,   
                'title' => $message, 
                'message'=> $message, 
                'type'=> $order->status, 
            ]);
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
