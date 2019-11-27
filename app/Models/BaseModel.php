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

    /**
     * Scopes.
     *
     * @param Builder $query
     * @param Object $filter
     */
    public function scopeFilter($query, $filters)
    {
        if ($filters) {
            foreach ($filters as $filter) {
                $column = $filter['column']??null;
                $value = $filter['value']??null;
                if (gettype($value) == 'string') {

                    
                    preg_match_all('/[<=>!]+|[\s\S]+/', $value, $matches, PREG_UNMATCHED_AS_NULL);
                    if (count($matches[0]) == 2) {
                        $condition = $matches[0][0];
                        $value = $matches[0][1];
                        switch ($condition) {
                            case '=':
                            case '!=':
                            case '>':
                            case '>=':
                            case '<':
                            case '<=':
                                if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
                                    $query->whereDate($column, $condition, $value);
                                } else {
                                    $query->where($column, $condition, $value);
                                }
                                break;
                            default :
                                if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
                                    $query->whereDate($column, "$value");
                                } else {
                                    $query->where($column, 'like', "%$value%");
                                }
                        }
                    } else {
                        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
                            $query->whereDate($column, "$value");
                        } else {
                            $query->where($column, 'like', "%$value%");
                        }
                    }
                } elseif (gettype($value) == 'array') {
                    $query->whereIn($column, $value);
                }
            }
        }
        return $query;
    }
}
