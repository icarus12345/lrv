<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name', 'value', 'display' ,'type'
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

    public function setValueAttribute($binary)
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
            
            
            $this->attributes['value'] = \Storage::disk($disk)->url($path);
        } else if (gettype($binary) == 'string') {
            $this->attributes['value'] = $binary;
        } else if (gettype($binary) == 'NULL') {
            $this->attributes['value'] = null;
        }
    }
}
