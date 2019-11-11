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
