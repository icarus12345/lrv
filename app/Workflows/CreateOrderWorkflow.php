<?php

namespace App\Workflows;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\Cart;
use App\Http\Requests\OrderRequest;
use DB;
use App\Notifications\MailOrderRequestNotification;

class CreateOrderWorkflow implements WorkflowInterface
{
    private $request;

    private $success;

    private $order;
    private $cart;
    private $message;

    public function __construct(OrderRequest $request)
    {
        $this->request = $request;
        $this->success = false;
        $this->cart = new Cart();
    }

    public function run()
    {
        if(!$this->cart->canCheckout()){
            $this->message = __('order.cant_checkout_with_emty_cart');
            return;
        }
        DB::beginTransaction();
        try {

            $this->order = new Order();
            $this->order->fill($this->request->all());
            $this->order->amount = $this->cart->total_amount;
            $this->order->tax_amount = $this->cart->getTaxAmount();
            $this->order->ship_amount = $this->cart->getShippingAmount();
            $this->order->flat_rate = $this->cart->flat_rate;
            $this->order->discount_amount = 0;
            $this->order->total_amount = $this->cart->getBillingAmount();
            $this->order->currency = \App\Helpers::getCurrency();
//            'coupon_id',
			if(\Auth::user()){
				$this->order->user_id = \Auth::user()->id;
			}
            $this->order->save();
            foreach ($this->cart->items as $item) {
                OrderDetail::create([
                    'order_id' => $this->order->id,
                    'product_id' => $item['id'], 
                    'color' => $item['color'], 
                    'size' => $item['size'], 
                    'qty' => $item['quanlity'], 
                    'price' => $item['price'],
                    'price_with_discount' => $item['price_with_discount'],
                    'discount' => $item['discount'],
                    'amount' => $item['price_with_discount'] * $item['quanlity'],
                ]);
            }
            $this->cart->clear();
            DB::commit();
            $this->success = true;
            $this->message = __('order.create_order_success');
            //\Notification::route('mail', config('mail.notification.address'))
            //    ->notify(new MailOrderRequestNotification($this->order));

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->message = $e->getMessage();
            DB::rollback();
        }
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function succeeded()
    {
        return $this->success;
    }

    public function getResult()
    {
        return $this->order;
    }
}