<?php

namespace App\Admin\Extensions\Show;

use Encore\Admin\Show\AbstractField;

class Typho extends AbstractField
{
    public $escape = false;
    public function render($arg = '')
    {
        // return any content that can be rendered
        // $this->unescape();
        return "<div class='ck ck-content'>{$this->value}</div>";
    }
}