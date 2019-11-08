<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name', 'value'
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
}
