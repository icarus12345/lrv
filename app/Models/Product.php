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
        'discount',
        'sold',
        'tags',
		// 'colors',
		// 'sizes',
    ];
	
	protected $casts = [
        //'colors' => 'json',
        //'sizes' => 'json',
        'pictures' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(\App\Models\Color::class, 'product_colors');
    }

    public function product_colors()
    {
        return $this->hasMany(\App\Models\ProductColor::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(\App\Models\Size::class, 'product_sizes');
    }

    public function product_sizes()
    {
        return $this->hasMany(\App\Models\ProductSize::class);
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

 //    public function setColorsAttribute($colors)
 //    {
 //        if (is_array($colors)) {
	// 		foreach($colors as $color) {
	// 			$arr[] = $color;
	// 		}
 //            $this->attributes['colors'] = json_encode($arr,true);
 //        }
 //    }
	
	// public function getColorsAttribute()
 //    {
 //        if($this->attributes['colors']) return json_decode($this->attributes['colors'], true);
 //        return [];
 //    }
	
	// public function setSizesAttribute($sizes)
 //    {
 //        if (is_array($sizes)) {
	// 		foreach($sizes as $size) {
	// 			$arr[] = $size;
	// 		}
 //            $this->attributes['sizes'] = json_encode($arr,true);
 //        }
 //    }

 //    public function getSizesAttribute()
 //    {
 //        if($this->attributes['sizes']) return json_decode($this->attributes['sizes'], true);
 //        return [];
 //    }
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
        $attributes['name'] = $this->name;
        $attributes['desc'] = $this->desc;
        $attributes['pictures'] = $this->pictures;
        $attributes['content'] = $this->content;
		$attributes['image'] = $this->image;
		//$attributes['colors'] = $this->colors;
		//$attributes['sizes'] = $this->sizes;

		return $attributes;
	}
	
	/**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeFeature($query, $num = 10)
    {
        return $query->inRandomOrder()
            ->offset(0)
            ->limit($num);
    }

    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where(function($query) use ($category) {
                $childs = $category->childs()->pluck('id')->toArray();
                $query->where('category_id',$category->id)
                    ->orWhereIn('category_id',$childs);
            });
    }


    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeTopSales($query, $num = 9)
    {
        return $query->orderBy("{$this->table}.sold",'desc')
            ->offset(0)
            ->limit($num);
    }
	
	// public function setImageAttribute($binary)
 //    {
 //        $disk = 'public';

 //        if (isset($this->attributes['id'])) {
 //            $path = \Storage::disk($disk)->putFile('product', $binary);
 //        } else {
 //            $path = $binary;
 //        }

 //        $this->attributes['image'] = $path;
 //    }

    public function setNullToImage()
    {
        $this->attributes['image'] = null;
    }

    // public function getImageAttribute()
    // {
    //     $disk = 'public/product';

    //     if (!$this->getOriginal('image')) {
    //         return '';
    //     }

    //     if (strpos($this->getOriginal('image'), 'http') !== false) {
    //         return $this->getOriginal('image');
    //     } else {
    //         return \Storage::disk($disk)->url($this->getOriginal('image'));
    //     }
    // }

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


	
	public function getPriceWithFormatAttribute()
	{
		return number_format($this->attributes['price']) . '<sup>₫</sup>';
	}

    public function getPriceWithDiscountFormatAttribute()
    {
        return number_format($this->attributes['price'] - $this->attributes['price']*$this->attributes['discount']/100) . '<sup>₫</sup>';
    }

    public function getStarAttribute()
    {
        return str_repeat('<i class="fa fa-star active"></i>',round($this->rating)) .
            str_repeat('<i class="fa fa-star"></i>',5-round($this->rating));
    }

    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeSimilar($query, $num = 10)
    {
        return $query->where('id','!=', $this->id)
            ->orderByRaw("{$this->table}.category_id=$this->category_id desc")
            ->orderBy("{$this->table}.sold",'desc')
            ->offset(0)
            ->limit($num);
    }

}
