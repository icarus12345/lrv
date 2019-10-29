<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Tree;
use App\Helpers;

class BaseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Get the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getLocaleAttribute()
    {
        
        return Helpers::getLocale();
    }
}
