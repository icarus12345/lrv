<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name', 
		'color',
    ];

    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeCountProduct($query)
    {
        return $query
        	->select('colors.*')
        	->addSelect(\DB::raw('count(*) as total'))
            ->leftJoin('product_colors','colors.id','=','product_colors.color_id')
            ->groupBy('colors.id');
    }
}
