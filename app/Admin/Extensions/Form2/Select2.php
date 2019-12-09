<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Select;

class Select2 extends Select
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.select';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	
	
    public function render()
    {
        // $this->script = "console.log(document.getElementById('form-group-{$this->id}').value)";
        return parent::render();
    }
}