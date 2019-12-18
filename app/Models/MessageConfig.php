<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageConfig extends Model
{
    protected $fillable = [
        'name', 'desc', 'message' ,'data'
    ];

    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeGetByName($query, $name)
    {
        return $query
            ->where('name',   $name)
            ->first();
    }

    public function setDataAttribute($data)
	{
        $this->attributes['data'] = json_encode($data,true);
	}

	public function getDataAttribute()
	{
		return json_decode($this->attributes['data']??null, true);
	}
}
