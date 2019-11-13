<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field\Text;

class Browse extends Text
{
    public static $js = [
        '/js/ckfinder/ckfinder.js',
        '/packages/browse/browse.js',
    ];
	protected $icon = 'fa-image';
    protected $view = 'admin.form.browse';
    //protected $elementClass = ['browse'];
	
	
	
    public function render()
    {
        $this->script = "$('#browse-{$this->id}').browse();
		";

        return parent::render();
    }
}