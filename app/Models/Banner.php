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
