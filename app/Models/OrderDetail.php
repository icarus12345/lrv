<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    //
    protected $fillable = [
        'order_id',
        'product_id', 
        'color', 
        'size', 
        'qty', 
        'price',
        'price_with_discount',
        'discount',
        'amount',
        
    ];


    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
	
	public function getProductNameAttribute()
    {
        
        return $this->product->name;
    }
	
    public function toArray() 
    {
        // List out all attributes you want to get, anytime this model is called.
        $attributes = parent::toArray();
        $attributes['product_name'] = $this->product_name;

        return $attributes;
    }
}
