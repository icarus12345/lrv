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
            if($type) return $query->where('type', $type);
            return $query;
        });
    }
	
	
	
	// public static function toTreeObject($nodes = null){
	// 	$self = new static();
	// 	return $self->buildNested($nodes);
	// }
	
	public static function buildNested($nodes = [], $parentId = 0)
    {
		$self = new static();
        $branch = [];
        
        foreach ($nodes as $node) {
            if ($node->{$self->parentColumn} == $parentId) {
                $children = $self->buildNested($nodes, $node->{$self->getKeyName()});

                if ($children) {
                    $node->children = $children;
                }

                $branch[] = $node;
            }
        }

        return $branch;
    }
	
	public function toArray() 
	{
		// List out all attributes you want to get, anytime this model is called.
		$attributes = parent::toArray();
		$attributes['name'] = $this->name;

		return $attributes;
	}
}
