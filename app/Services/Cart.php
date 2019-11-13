<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;

class Cart
{
    public $items;
    public $total_amount;
    public $total_item;
    public $flat_rate;
    public $coupon;

    public function __construct() {
        $cart = \Session::get('shoping_cart') ?? 
        [
            'items'=> [],
            'total_amount' => 0,
            'total_item' => 0,
            'flat_rate' => 0,
            'coupon' => null,
        ];
        $this->items = $cart['items']??[];
        $this->total_amount = $cart['total_amount']??0;
        $this->total_item = $cart['total_item']??0;
        $this->flat_rate = $cart['flat_rate']??0;
        $this->coupon = $cart['coupon']??null;
    }
	
	public function applyCoupon($coupon){
		$this->coupon = $coupon;
		$this->save();
	}
	
    public function save(){
        \Session::put('shoping_cart',[
            'items'=> $this->items,
            'total_amount' => $this->total_amount,
            'total_item' => $this->total_item,
            'flat_rate' => $this->flat_rate,
            'coupon' => $this->coupon,
        ]);
    }

    public function add($product_id, $quanlity = 1, $size_id = null, $color_id = null) {
        $product = Product::findOrFail($product_id);
		
		$size = Size::find($size_id)??$product->sizes()->first();
        $color = Color::find($color_id)??$product->colors()->first();
		if($size) {
			$size_name = $size->name??null;
			$size_id = $size->id??null;
		}
		if($color) {
			$color_name = $color->name??null;
			$color_id = $color->id??null;
		}
		
        $key = "$product_id-{$color_id}-{$size_id}";
        if(empty($this->items[$key])){
            $this->items[$key] = [
                'id'=>$product->id,
                'name'=>$product->name,
                'image_path'=>$product->image_path,
                'price'=>$product->price,
                'discount'=>$product->discount,
                'price_with_discount'=>$product->price_with_discount,
                'color'=>$color_name??null,
                'size'=>$size_name??null,
                'quanlity' => 0
            ];
            $this->total_item ++;
        }
        $this->items[$key]['quanlity'] += $quanlity;
        $this->total_amount += $product->price_with_discount * $quanlity;
        $this->save();
    }

    public function update($key, $quanlity) {
        if(!empty($this->items[$key])){
            $this->total_amount-=$this->items[$key]['price_with_discount'] * $this->items[$key]['quanlity'];

            $this->items[$key]['quanlity'] = $quanlity;
            $this->total_amount+=$this->items[$key]['price_with_discount'] * $this->items[$key]['quanlity'];
            if($quanlity == 0) {
                $this->total_item --;
                unset($this->items[$key]);
            }
            $this->save();
        }
    }

    public function remove($key) {
        if(!empty($this->items[$key])){
            $this->total_amount-=$this->items[$key]['price_with_discount'] * $this->items[$key]['quanlity'];
            $this->total_item --;
            unset($this->items[$key]);
            $this->save();
        }
    }
	
	public function getCouponDiscoutAmount() {
		if($this->coupon) {
			if($this->coupon['type'] == \App\Models\Coupon::STATUS_DISCOUNT){
				return $this->total_amount * $this->coupon['value'] / 100;
			}elseif($this->coupon['type'] == \App\Models\Coupon::STATUS_CASH){
				return min($this->total_amount,$this->coupon['value']);
			}elseif($this->coupon['type'] == \App\Models\Coupon::STATUS_COMPLIMENTARY){
				return $this->total_amount;
			}
		}
        return 0;
    }
	
	public function getSubTotal() {
		if($this->coupon) {
			if($this->coupon['type'] == \App\Models\Coupon::STATUS_DISCOUNT){
				return $this->total_amount - $this->total_amount * $this->coupon['value'] / 100;
			}elseif($this->coupon['type'] == \App\Models\Coupon::STATUS_CASH){
				return max(0,$this->total_amount - $this->coupon['value']);
			}elseif($this->coupon['type'] == \App\Models\Coupon::STATUS_COMPLIMENTARY){
				return 0;
			}
		}
        return $this->total_amount;
    }

    public function getTotalAmountWithShiping() {
        if($this->flat_rate)
            return $this->getSubTotal() + \App\Helpers::getFlatRate();
        return $this->getSubTotal();
    }
    public function getTaxAmount() {
        return $this->getSubTotal() * \App\Helpers::getTax() / 100;
    }
    public function getShippingAmount() {
        if($this->flat_rate)
            return \App\Helpers::getFlatRate();
        return 0;
    }
    public function getBillingAmount() {
        return $this->getTotalAmountWithShiping() + $this->getTaxAmount();
    }
    public function setShipingType($flat_rate) {
        $this->flat_rate = $flat_rate;
        $this->save();
    }
    public function canCheckout(){
        return $this->total_item > 0;
    }
    public function clear(){
        \Session::forget('shoping_cart');
    }
}