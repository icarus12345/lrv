<?php

namespace App\Admin\Extensions\Show;

use Encore\Admin\Show\AbstractField;

class Browse extends AbstractField
{
	public $escape = false;
    public function render($arg = '')
    {
        // return any content that can be rendered
        return "<img src='$this->value' height='100' />";
    }
}