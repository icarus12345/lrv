<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Checkbox;

class Checkbox2 extends Checkbox
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.checkbox';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	
	
    public function render()
    {
        return parent::render();
    }
}