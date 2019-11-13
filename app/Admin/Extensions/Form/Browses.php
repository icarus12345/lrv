<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field\Textarea;

class Browses extends Textarea
{
    public static $js = [
        '/js/ckfinder/ckfinder.js',
        '/packages/browses/browses.js',
        '/js/dropify/js/dropify-multiple.js',
    ];
    public static $css = [
        '/packages/browses/browses.css',
        '/js/dropify/css/dropify-multiple.css',
    ];
	protected $icon = 'fa-image';
    protected $view = 'admin.form.browses';
    //protected $elementClass = ['browse'];
	
	
	
    public function render()
    {
        $this->script = "$('#browses-{$this->id}').browses();
		";

        return parent::render();
    }
}