<?php

namespace App\Models;

use App\Models\BaseModel;

class Content extends BaseModel
{
    protected $table = 'contents';
    protected $fillable = [
        'title_vi', 
		'title_en',
		'desc_vi',
		'desc_en',
		'image',
		'content_en',
		'content_vi',
        'type',
    ];

    public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
        $attributes['title'] = $this->title;
        // $attributes['desc'] = $this->desc;
        $attributes['content'] = $this->content;
		$attributes['image'] = $this->image;

		return $attributes;
	}

    /**
     * Get the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute()
    {
        
        return $this->{"title_{$this->locale}"};
    }
	
	public function getDescAttribute()
    {
        
        return $this->{"desc_{$this->locale}"};
    }
	
	public function getContentAttribute()
    {
        
        return $this->{"content_{$this->locale}"};
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
