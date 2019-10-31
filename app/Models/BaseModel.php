<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Tree;

class BaseModel extends Model
{
    

    /**
     * Get the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLocaleAttribute()
    {
        
        return \App::getLocale();
    }
}
