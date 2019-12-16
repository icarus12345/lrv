<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\HasMany;

class HasMany2 extends HasMany
{
    public static $js = [
    ];
    public static $css = [
    ];
	// protected $icon = 'fa-image';
    protected $views = [
        'default' => 'admin.form2.hasmany',
        'tab'     => 'admin.form2.hasmanytab',
        'table'   => 'admin.form2.hasmanytable',
    ];
    protected $horizontal = false;
    protected $placeholder = ' ';
    protected $groupClass = [''];
	
	public function setFieldWidth($widths){
        $this->variables['widths'] = $widths;
        return $this;
    }
	
    public function render()
    {
        return parent::render();
    }
}