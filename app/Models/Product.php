<?php

namespace App\Models;

use App\Models\BaseModel;
class Product extends BaseModel
{
    //
	protected $table = 'products';
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
        'label',
        'instock',
        'tags',
		'colors',
		'sizes',
    ];
	
	protected $casts = [
        'colors' => 'json',
        'sizes' => 'json',
        'pictures' => 'array',
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
			$this->attributes['pictures'] = json_encode($pictures,true);
		}
	}

	public function getPicturesAttribute()
	{
		return json_decode($this->attributes['pictures'], true);
	}

    public function setColorsAttribute($colors)
    {
        if (is_array($colors)) {
			foreach($colors as $color) {
				$arr[] = $color;
			}
            $this->attributes['colors'] = json_encode($arr,true);
        }
    }
	
	public function getColorsAttribute()
    {
        if($this->attributes['colors']) return json_decode($this->attributes['colors'], true);
        return [];
    }
	
	public function setSizesAttribute($sizes)
    {
        if (is_array($sizes)) {
			foreach($sizes as $size) {
				$arr[] = $size;
			}
            $this->attributes['sizes'] = json_encode($arr,true);
        }
    }

    public function getSizesAttribute()
    {
        if($this->attributes['sizes']) return json_decode($this->attributes['sizes'], true);
        return [];
    }
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
        $attributes['name'] = $this->name;
        $attributes['desc'] = $this->desc;
        $attributes['pictures'] = $this->pictures;
        $attributes['content'] = $this->content;
		$attributes['image'] = $this->image;
		$attributes['colors'] = $this->colors;
		$attributes['sizes'] = $this->sizes;

		return $attributes;
	}
	
	/**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeFeature($query)
    {
        return $query->inRandomOrder();
    }
	
	public function setImageAttribute($binary)
    {
        $disk = 'public';

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
        $disk = 'public/product';

        if (!$this->getOriginal('image')) {
            return '/images/no-image.svg';
        }

        if (strpos($this->getOriginal('image'), 'http') !== false) {
            return $this->getOriginal('image');
        } else {
            return \Storage::disk($disk)->url($this->getOriginal('image'));
        }
    }
	
	public function getPriceWithFormatAttribute($pictures)
	{
		return number_format($this->attributes['price']) . '₫';
	}
}
