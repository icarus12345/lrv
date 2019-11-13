<?php

namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field\Textarea;

class CKEditor extends Textarea
{
    public static $js = [
        '/packages/ckeditor/ckeditor.js',
        '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.form.ckeditor';

    public function render()
    {
        $this->script = "$('textarea.{$this->getElementClassString()}').ckeditor({
			filebrowserBrowseUrl: '".route('ckfinder_browser')."',
			'toolbar': [
                ['ShowBlocks', 'Image'],
                ['NumberedList', 'BulletedList'],['Outdent', 'Indent'],['Link', 'Unlink'],
                ['JustifyLeft', 'JustifyCenter'], ['JustifyRight', 'JustifyBlock'],
                ['Format'], ['TextColor', 'BGColor']
            ],
			});";

        return parent::render();
    }
}