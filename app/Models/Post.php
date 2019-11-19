<?php

namespace App\Models;

use App\Models\BaseModel;

class Post extends BaseModel
{
    //
	protected $table = 'posts';
    protected $fillable = [
        'title_vi',
		'title_en', 
		'desc_vi',
		'desc_en',
		'content_vi',
		'content_en',
		'image',
		'tags',
		'category_id',
    ];
	
	
	
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class,'topic_id')
			->orderBy('created_at','desc');
    }

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
	
	public function scopeNewest($query)
    {
        return $query->orderBy('id','desc');
    }

    public function scopeGetArchive($query)
    {
        $column = "DATE_FORMAT(created_at, '%M %Y')";
        $column2 = "DATE_FORMAT(created_at, '%Y-%m')";
        return $query->select([\DB::raw("$column as 'archive_title'"), \DB::raw("$column2 as 'month'")])
            ->groupBy([\DB::raw("$column"), \DB::raw("$column2")])
            ->orderBy(\DB::raw("$column"),'desc');
    }

    public function scopeByArchive($query, $month)
    {
        
        $column = "DATE_FORMAT(created_at, '%Y-%m')";
        return $query->where(\DB::raw("$column"), $month);
    }
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
        $attributes['title'] = $this->title;
        $attributes['desc'] = $this->desc;
        $attributes['content'] = $this->content;
		$attributes['image'] = $this->image;

		return $attributes;
	}
}
