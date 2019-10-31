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
	
	
	public function setImageAttribute($binary)
    {
        $disk = 'public/banner';

        if (isset($this->attributes['id'])) {
            $path = \Storage::disk($disk)->putFile($this->attributes['id'], $binary, 'public');
        } else {
            $path = $binary;
        }

        $this->attributes['image'] = $path;
    }

    public function setNullToImage()
    {
        $this->attributes['image'] = null;
    }

    public function getImageAttribute()
    {
        $disk = 'public';

        if (!$this->getOriginal('image')) {
            return 'images/no-image.svg';
        }

        if (strpos($this->getOriginal('image'), 'http') !== false) {
            return $this->getOriginal('image');
        } else {
            return \Storage::disk($disk)->url($this->getOriginal('image'));
        }
    }
	
	
}
