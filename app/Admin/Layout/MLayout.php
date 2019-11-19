<?php

namespace App\Admin\Extensions\Layout;

use Encore\Admin\Form;
use Encore\Admin\Form\Layout\Layout;
use App\Admin\Extensions\Layout\Any;
use Illuminate\Support\Collection;

class MLayout extends Layout
{
    
    /**
     * Add a new column in layout.
     *
     * @param int      $width
     * @param \Closure $closure
     */
    public function any(\Closure $closure)
    {
        if ($this->columns->isEmpty()) {
            $column = $this->current;

            $column->setWidth(12);
        } else {
            $column = new Column(12);

            $this->current = $column;
        }

        $this->columns->push($column);

        $closure($this->parent);
    }
}
