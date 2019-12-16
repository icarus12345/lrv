<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'warehouse_id', 'product_id', 'qty'
    ];

    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }
}
