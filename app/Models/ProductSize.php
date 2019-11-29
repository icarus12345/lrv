<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    //
    protected $fillable = [
        'product_id',
        'size_id' 
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function size()
    {
        return $this->belongsTo(\App\Models\Size::class);
    }
}
