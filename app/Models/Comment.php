<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'topic_type','topic_id', 'message', 'name', 'email', 'user_id'
    ];

    public function post()
    {
        return $this->belongsTo(\App\Models\Post::class,'id','topic_id')
			->where('topic_type','post');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
	
	/**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeByTopic($query, $topic_id, $topic_type)
    {
        return $query
			->where('topic_id', $topic_id)
			->where('topic_type', $topic_type)
            ->orderBy('created_at','desc');
    }
}
