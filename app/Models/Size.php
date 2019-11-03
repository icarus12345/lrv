<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name', 
    ];

    /**
     * Scopes.
     *
     * @param Builder $query
     */
    public function scopeCountProduct($query)
    {
        return $query
        	->select('sizes.*')
        	->addSelect(\DB::raw('count(*) as total'))
            ->leftJoin('product_sizes','sizes.id','=','product_sizes.size_id')
            ->groupBy('sizes.id');
    }
}
