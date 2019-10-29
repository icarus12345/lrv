<?php

namespace App\Models;

use App\Models\BaseModel;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Tree;
use App\Helpers;

class Category extends BaseModel
{
    use ModelTree, AdminBuilder;
    //
    protected $fillable = [
        'name_vi','name_en', 'order', 'parent_id',
    ];
    public function __construct()
    {
        parent::__construct();
        $this->setParentColumn('parent_id');
        $this->setTitleColumn("name_{$this->locale}");

    }

    public function parent()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * Get the name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        
        return $this->{"name_{$this->locale}"};
    }

    public static function treeByType($type){
        $self = new static();
        $tree = new Tree($self);
        return $tree->query(function($query) use ($type) {
            if($type) $query->where('type', $type);
            return $query;
        });
    }
}
