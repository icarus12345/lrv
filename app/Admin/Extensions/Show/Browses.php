<?php

namespace App\Admin\Extensions\Show;

use Encore\Admin\Show\AbstractField;

class Browses extends AbstractField
{
	public $escape = false;
    public function render($arg = '')
    {
		return collect((array) $this->value)->map(function ($src) {
			return "<div class='show-browse'><img src='$src'/></div>";
		})->implode(' ');
    }
}