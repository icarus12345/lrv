<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\MultipleSelect;

class MultipleSelect2 extends MultipleSelect
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.multipleselect';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	
	
    public function render()
    {
        return parent::render();
    }
}