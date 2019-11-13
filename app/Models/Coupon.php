<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
	const STATUS_DISCOUNT = 'Discount';
	const STATUS_CASH = 'Cash';
	const STATUS_COMPLIMENTARY = 'Complimentary';
	protected $table = 'coupons';
    protected $fillable = [
        'code', 
		'expried',
		'value',
		'type',
    ];
	
	public function scopeFindByCode($query, $code)
    {
        return $query->where('code',$code);
    }
}
