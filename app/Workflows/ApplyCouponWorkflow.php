<?php

namespace App\Workflows;

use App\Models\Product;
use App\Models\Coupon;
use App\Services\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ApplyCouponWorkflow implements WorkflowInterface
{
    private $request;

    private $success;

    private $cart;
    private $message;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->success = false;
        $this->cart = new Cart();
    }

    public function run()
    {
        
        try {
			$coupon_code = $this->request->coupon_code;
			$this->cart->applyCoupon(null);
			if($coupon_code){
				$coupon = Coupon::findByCode($coupon_code)->first();
				if($coupon){
					$expried = Carbon::parse($coupon->expried);
					if (Carbon::now()->gt($expried)) {
						$this->message = __('The coupon code has expired.');
						return;
					}else{
						$this->cart->applyCoupon($coupon->toArray());
					}
				}else{
					$this->message = __('The coupon code does not exist.');
					return;
				}
			}else{
				
			}
            $this->success = true;
            $this->message = __('Apply coupon code success.');

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->message = $e->getMessage();
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
        return $this->cart;
    }
}