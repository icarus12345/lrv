<?php

namespace App\Models;

use App\Models\BaseModel;
class Warehouse extends BaseModel
{
    protected $fillable = [
        'location_id', 'name', 'address' , 'lat' , 'lon', 'status'
    ];

    public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
        // $attributes['location_name'] = $this->location_name;

		return $attributes;
	}

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
    public function inventories()
    {
        return $this->hasMany(\App\Models\Inventory::class);
    }
}
