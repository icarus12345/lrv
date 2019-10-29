<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Tree;

class Category extends Model
{
    use ModelTree, AdminBuilder;
    //
    protected $fillable = [
        'name', 'parent_id',
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setParentColumn('parent_id');
        $this->setTitleColumn('name');
        
    }

    public static function treeByType($type){
        $self = new static();
        $tree = new Tree($self);
        return $tree->query(function($query) use ($type) {
            return $query->where('type', $type);
        });
    }
}
