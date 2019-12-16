<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Number;

class Number2 extends Number
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.input';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = ['number2'];
	
	
	
    public function render()
    {
        // $this->script = "$('#browse-{$this->id}').browse();";
        return parent::render();
    }
}