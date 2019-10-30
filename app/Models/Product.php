<?php

namespace App\Models;

use App\Models\BaseModel;

class Product extends BaseModel
{
    //
    protected $fillable = [
        'category_id', 
        'name_vi', 
		'name_en',
		'desc_vi',
		'desc_en',
		'image',
		'pictures',
		'price',
		'content_en',
		'content_vi',
		'review_num',
		'rating',
		'status',
		'type',
    ];
	
	protected $casts = [
        'pictures' => 'array'
    ];
    

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
	
	/**
     * Get the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        
        return $this->{"name_{$this->locale}"};
    }
	
	public function getDescAttribute()
    {
        
        return $this->{"desc_{$this->locale}"};
    }
	
	public function getContentAttribute()
    {
        
        return $this->{"content_{$this->locale}"};
    }
	public function setPicturesAttribute($pictures)
	{
		if (is_array($pictures)) {
			$this->attributes['pictures'] = json_encode($pictures);
		}
	}

	public function getPicturesAttribute($pictures)
	{
		return json_decode($pictures, true);
	}
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
		$attributes['name'] = $this->name;

		return $attributes;
	}
}
