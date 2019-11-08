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

    public function __construct() {
        $cart = \Session::get('shoping_cart') ?? 
        [
            'items'=> [],
            'total_amount' => 0,
            'total_item' => 0,
            'flat_rate' => 0,
        ];
        $this->items = $cart['items']??[];
        $this->total_amount = $cart['total_amount']??0;
        $this->total_item = $cart['total_item']??0;
        $this->flat_rate = $cart['flat_rate']??0;
    }

    public function save(){
        \Session::put('shoping_cart',[
            'items'=> $this->items,
            'total_amount' => $this->total_amount,
            'total_item' => $this->total_item,
            'flat_rate' => $this->flat_rate,
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
                'color'=>$color_name??null,
                'size'=>$size_name??null,
                'quanlity' => 0
            ];
            $this->total_item ++;
        }
        $this->items[$key]['quanlity'] += $quanlity;
        $this->total_amount += $product->price * $quanlity;
        $this->save();
    }

    public function update($key, $quanlity) {
        if(!empty($this->items[$key])){
            $this->total_amount-=$this->items[$key]['price'] * $this->items[$key]['quanlity'];

            $this->items[$key]['quanlity'] = $quanlity;
            $this->total_amount+=$this->items[$key]['price'] * $this->items[$key]['quanlity'];
            if($quanlity == 0) {
                $this->total_item --;
                unset($this->items[$key]);
            }
            $this->save();
        }
    }

    public function remove($key) {
        if(!empty($this->items[$key])){
            $this->total_amount-=$this->items[$key]['price'] * $this->items[$key]['quanlity'];
            $this->total_item --;
            unset($this->items[$key]);
            $this->save();
        }
    }

    public function getTotalAmountWithShiping() {
        if($this->flat_rate)
            return $this->total_amount + \App\Helpers::getFlatRate();
        return $this->total_amount;
    }
    public function setShipingType($flat_rate) {
        $this->flat_rate = $flat_rate;
        $this->save();
    }
}