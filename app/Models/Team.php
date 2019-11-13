<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
class Team extends BaseModel
{
    //
	protected $table = 'teams';
    protected $fillable = [
        'name', 
		'position_vi',
		'position_en',
		'image',
		'fb_link',
		'tw_link',
    ];
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
		$attributes['position'] = $this->position;

		return $attributes;
	}
	public function getPositionAttribute()
    {
        
        return $this->{"position_{$this->locale}"};
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
            $path = "{$hash}.jpg";
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
        $disk = 'public';
        if (!$this->attributes['image']) {
            return '/images/no-image.svg';
        }
        if (strpos($this->attributes['image'], 'http') !== false) {
            return $this->attributes['image'];
        } else {
			if (strpos($this->attributes['image'], '/storage') === 0) {
				return $this->attributes['image'];
			}
            return \Storage::disk($disk)->url($this->attributes['image']);
        }
    }
}
