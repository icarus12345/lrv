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

    public function setImageAttribute($binary)
    {
        if (gettype($binary) == 'object') {

            // Configs
            $disk = 'public';
            
            $image = \Image::make($binary)
            // ->resize(300, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })
            // ->resizeCanvas(200, 200, 'center')
            ->orientate()
            ->encode('jpg');
            $hash = md5($image->__toString());
            $path = "images/{$hash}.jpg";
            // Save image
            \Storage::disk($disk)->put($path, $image->__toString(), 'public');
            
            
            $this->attributes['image'] = \Storage::disk($disk)->url($path);
        } else if (gettype($binary) == 'string') {
            $this->attributes['image'] = $binary;
        } else if (gettype($binary) == 'NULL') {
            $this->attributes['image'] = null;
        }
    }

    public function getImagePathAttribute()
    {
        $disk = 'local';
        if (!$this->image) {
            return '/images/no-image.svg';
        }
        return $this->attributes['image'];
    }
}
