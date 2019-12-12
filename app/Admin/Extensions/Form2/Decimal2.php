<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Decimal;

class Decimal2 extends Decimal
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.input';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = ['decimal2'];
	
	
	
    public function render()
    {
        // $this->script = "$('#browse-{$this->id}').browse();";
        return parent::render();
    }
}