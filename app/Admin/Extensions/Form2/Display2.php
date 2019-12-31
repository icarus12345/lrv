<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Display;

class Display2 extends Display
{
    public static $js = [
    ];
    public static $css = [
    ];
    protected $horizontal = false;

	protected $view = 'admin.form2.display';
    public function render()
    {
        return parent::render();
    }
}