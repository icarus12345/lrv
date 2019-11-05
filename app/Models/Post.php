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
        return $this->hasMany(\App\Models\Comment::class);
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
