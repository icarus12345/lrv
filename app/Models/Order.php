<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
        'coupon_id',
        'amount',
        'tax_amount',
        'flat_rate',
        'ship_amount',
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
}
