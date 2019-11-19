<?php

namespace App\Admin\Extensions;

use Encore\Admin\Form;
use App\Admin\Extensions\Layout\MLayout;
use App\Admin\Extensions\Layout\Any;

class MForm extends Form
{
    /**
     * Initialize filter layout.
     */
    protected function initLayout()
    {
        $this->layout = new MLayout($this);
    }

    public $anys = [];
     /**
     * Add a row in form.
     *
     * @param Closure $closure
     *
     * @return $this
     */
    public function any(\Closure $closure): self
    {
        //$this->anys[] = new Any($closure, $this);
        $this->layout->any($closure);
        return $this;
    }
}
