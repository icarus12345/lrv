<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryHeader extends Model
{
    protected $fillable = [
        'document_no', 'title', 'posting_date', 'created_by'
    ];
    
    public function products()
    {
        return $this->belongsToMany(\App\Models\Product::class, 'inventory_lines');
    }
    
    public function lines()
    {
        return $this->hasMany(\App\Models\InventoryLine::class);
    }
    public function created_admin()
    {
        return $this->hasOne(\Encore\Admin\Auth\Database\Administrator::class, 'id', 'created_by');
    }
}
