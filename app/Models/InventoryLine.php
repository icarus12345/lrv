<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryLine extends Model
{
    protected $fillable = [
        'inventory_header_id', 'product_id', 'warehouse_id', 'line_memo', 'qty', 'price', 'amount','refer_id'
    ];

    public function warehouse()
    {
        return $this->belongsTo(\App\Models\Warehouse::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function inventory_header()
    {
        return $this->belongsTo(\App\Models\InventoryHeader::class);
    }
    public function inventory()
    {
        return \App\Models\Inventory::where([
            'product_id' => $this->product_id,
            'warehouse_id' => $this->warehouse_id,
        ])->first();
    }
}
