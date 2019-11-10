<?php

namespace App\Models;

use App\Models\BaseModel;
class Banner extends BaseModel
{
    //
	protected $table = 'banners';
    protected $fillable = [
        'name_vi', 
		'name_en',
		'desc_vi',
		'desc_en',
		'image',
		'link',
		'type',
    ];
	
	
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
	
	
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
		$attributes['name'] = $this->name;
		$attributes['desc'] = $this->desc;

		return $attributes;
	}
	
	
	

    public function setNullToImage()
    {
        $this->attributes['image'] = null;
    }

    public function getImagePathAttribute()
    {
        $disk = 'local';
        if (!$this->image) {
            return '/images/no-image.svg';
        }
        if (strpos($this->attributes['image'], 'http') !== false) {
            return $this->attributes['image'];
        } else {
            return \Storage::disk($disk)->url($this->attributes['image']);
        }
    }
	
	
}
