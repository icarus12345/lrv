<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
	protected $table = 'posts';
    protected $fillable = [
        'title_vi','title_en', 'content','category_id','type'
    ];

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}
