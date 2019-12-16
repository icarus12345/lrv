<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
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
}
