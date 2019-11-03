<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
    protected $table = 'product_colors';

    protected $fillable = [
        'product_id',
        'color_id' 
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function color()
    {
        return $this->belongsTo(\App\Models\Color::class);
    }
}
