<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class Order extends BaseModel
{
    const STATUS_REQUESTED = 'Requested';
    const STATUS_APPROVED = 'Approved';
    const STATUS_UNPAID = 'Unpaid';
    const STATUS_PAID = 'Paid';
    const STATUS_SHIPPING = 'Shipping';
    const STATUS_DONE = 'Done';
    const STATUS_CANCELED = 'Canceled';
    //
    protected $fillable = [
        'user_id',
        'name',  
        'company', 
        'email', 
        'street_address',
        'other_address',
        'state_city',
        'country',
        'city',
        'postcode_zip',
        'phone',
        'coupon_code',
        'amount',
        'tax_amount',
        'flat_rate',
        'ship_amount',
        'discount',
        'discount_amount',
        'total_amount',
        'billing_amount',
        'total_item',
        'currency',
        'status',
        'note',
    ];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
	
	

    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'order_details');
    }

    public function histories()
    {
        return $this->hasMany(\App\Models\OrderHistory::class, 'header_id')->orderBy('id','desc');
    }
    
    public function order_details()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }

    public function getNoAttribute()
    {
        
        return 'ORD' . sprintf('%06d', $this->id);
    }


    public function toArray() 
    {
        // List out all attributes you want to get, anytime this model is called.
        $attributes = parent::toArray();
        $attributes['no'] = $this->no;
        $attributes['full_name'] = $this->full_name;
        $attributes['token'] = $this->token;

        return $attributes;
    }

    public function getTokenAttribute()
    {
        
        return \Hash::make($this->no);
    }

    public function checkToken($token)
    {
        
        return \Hash::check($this->no, $token);
    }
	
	public function scopeByStatus($query, $status = null)
    {
		if($status == 'requested'){
			$query->where('status','Requested');
		}elseif($status == 'pending'){
			$query->whereIn('status',['Requested','Approved','Unpaid','Paid','Shipping']);
		}if($status == 'done'){
			$query->where('status','Done');
		}if($status == 'canceled'){
			$query->where('status','Canceled');
		}
        return $query;
    }

    public function caculator(){

        $amount = 0;
        $tax_amount = 0;
        $ship_amount = $this->ship_amount;
        $discount = $this->discount;
        $discount_amount = $this->discount_amount;
        $total_amount = 0;
        foreach ($this->order_details as $detail) {
            $product = $detail->product;
            $qty = $detail->qty;
            $subAmount = 0;
            if ($product) {
                $price = $detail->price;
                $price_with_discount = $detail->price_with_discount;
                $subAmount = $qty * $price_with_discount;
            }
            $amount += $subAmount;
        }
        

        
        if($discount){
            $discount_amount = $amount * $discount / 100;
        }
        
        $total_amount = $amount - $discount_amount + $ship_amount;
        
        $tax = \App\Helpers::getTax();
        $tax_amount = $total_amount * $tax / 100;
        
        $this->amount = $amount;
        $this->discount_amount = $discount_amount;
        $this->tax_amount = $tax_amount;
        $this->total_amount = $total_amount + $tax_amount;
    }
}
