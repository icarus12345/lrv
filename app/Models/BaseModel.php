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

    public function scopeSort($query, $column, $ascending) {
        if ($this->localeField && in_array($column, $this->localeField)) {
            $column = "{$column}_{$this->locale}";
        }
        return $query->orderBy($column, $ascending);
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
                if ($this->localeField && in_array($column, $this->localeField)) {
                    $column = "{$column}_{$this->locale}";
                }
                $value = $filter['value']??null;
                if (gettype($value) == 'string') {

                    $conditions = preg_split("/s*,s*/", trim($value), -1, PREG_SPLIT_NO_EMPTY);
                    foreach ($conditions as $sub) {
                        preg_match_all('/[<=>!]+|[\s\S]+/', trim($sub), $matches, PREG_UNMATCHED_AS_NULL);
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
                            $value = trim($sub);
                            if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
                                $query->whereDate($column, "$value");
                            } else {
                                $query->where($column, 'like', "%$value%");
                            }
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
