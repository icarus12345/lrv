<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Textarea;

class Textarea2 extends Textarea
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.textarea';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	
	
    public function render()
    {
        return parent::render();
    }
}