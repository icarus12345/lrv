<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Url;

class Url2 extends Url
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $view = 'admin.form2.input';
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	
	
    public function render()
    {
        // $this->script = "$('#browse-{$this->id}').browse();";
        return parent::render();
    }
}