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

    public function scopeWithWarehouse($query)
    {
        $query
            // ->leftjoin('inventory_headers as ih', 'ih.document_no', '=' ,'order_details.order_id')
            ->leftjoin('inventory_lines as il', function($join){
                $join->on('order_details.id', '=' ,'il.refer_id')
                ->where('il.product_id', \DB::raw('order_details.product_id'));
            })
            ->leftjoin('warehouses as wh', 'il.warehouse_id', '=' ,'wh.id')
            ->addSelect([
                'inventory_header_id',
                \DB::raw('il.id as inventory_line_id'), 
                \DB::raw('wh.id as warehouse_id'), 
                \DB::raw('wh.name as warehouse_name')
            ]);
    }

    public function setQtyAttribute($qty)
	{
		$this->attributes['qty'] = $qty;
		$this->attributes['amount'] = $qty * $this->attributes['price_with_discount'];
    }
    
    public function setProductIdAttribute($product_id)
	{
        $this->attributes['product_id'] = $product_id;
        $product = $this->product()->first();
        if($product){
            $this->attributes['price'] = $product->price;
            $this->attributes['price_with_discount'] = $product->price_with_discount;
            if(!empty($this->attributes['qty'])){
                $this->attributes['amount'] = $this->attributes['qty'] * $this->attributes['price_with_discount'];
            }
        }
	}
	
	public function getProductNameAttribute()
    {
        if($this->product)
            return $this->product->name;
        return null;
    }
	
    public function toArray() 
    {
        // List out all attributes you want to get, anytime this model is called.
        $attributes = parent::toArray();
        $attributes['product_name'] = $this->product_name;

        return $attributes;
    }

    public function getPriceWithDiscountFormatAttribute()
    {
        return  \App\Helpers::formatPrice($this->price_with_discount);
    }

    public function getAmountFormatAttribute()
    {
        return  \App\Helpers::formatPrice($this->amount);
    }
}
