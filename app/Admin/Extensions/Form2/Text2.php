<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Text;

class Text2 extends Text
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
	
    
    public function setFieldWidth($width){
        $this->variables['style'] = "width: {$width}px";
        return $this;
    }
	
    public function render()
    {
        // $this->script = "$('#browse-{$this->id}').browse();";
        return parent::render();
    }
}