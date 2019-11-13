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
        'labels',
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
        'labels' => 'array',
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
		return json_decode($this->attributes['pictures'], true)??[];
	}
	
	public function setLabelsAttribute($labels)
	{
		if (is_array($labels)) {
			$this->attributes['labels'] = json_encode($labels,true);
		}
	}

	public function getLabelsAttribute()
	{
		return json_decode($this->attributes['labels'], true)??[];
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
        $attributes['labels'] = $this->labels;
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

	public function scopeCategoryIn($query, $category_ids)
    {
		if($category_ids) {
			return $query->whereIn('category_id',$category_ids);
		}
		return $query;
    }
	
	public function scopeColorIn($query, $color_ids)
    {
		
		if($color_ids) {
			return $query->whereHas('product_colors', function ($query) use ($color_ids) {
				$query->whereIn('color_id', $color_ids);
				
			});
		}
		
		return $query;
    }
	public function scopePriceIn($query, $min = 0, $max = 0)
    {
		
		if((float)$min>=0 && (float)$max>0) {
			return $query->whereBetween(\DB::raw('price*(100-discount)/100'), [(float)$min, (float)$max]);
		}
		
		return $query;
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
			if (strpos($this->attributes['image'], '/storage') === 0) {
				return $this->attributes['image'];
			}
            return \Storage::disk($disk)->url($this->attributes['image']);
        }
    }

	public function getPriceWithFormatAttribute()
	{
		$price = \App\Helpers::formatPrice($this->attributes['price']??0);
		return $price;
	}
	
	
	public function getPriceWithDiscountAttribute()
    {
		$price = $this->attributes['price'] - $this->attributes['price']*$this->attributes['discount']/100;
        return $price;
    }
	
    public function getPriceWithDiscountFormatAttribute()
    {
		$price = \App\Helpers::formatPrice($this->attributes['price'] - $this->attributes['price']*$this->attributes['discount']/100);
        return $price;
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
	
	public function scopeNewest($query)
    {
        return $query->orderBy('id','desc');
    }
}
