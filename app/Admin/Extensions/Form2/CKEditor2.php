<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Textarea;

class CKEditor2 extends Textarea
{
    public static $js = [
        '/packages/ckeditor/ckeditor.js',
        '/packages/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.form2.ckeditor';

    public function render()
    {
        $this->script = "
            CKEDITOR.disableAutoInline = true;
            CKEDITOR.inline( 'cke-{$this->id}', {
                filebrowserBrowseUrl: '".route('ckfinder_browser')."',
                'toolbar': [
                    ['ShowBlocks', 'Image'],
                    ['NumberedList', 'BulletedList'],['Outdent', 'Indent'],['Link', 'Unlink'],
                    ['JustifyLeft', 'JustifyCenter'], ['JustifyRight', 'JustifyBlock'],
                    ['Format'], ['TextColor', 'BGColor']
                ],
            });
            CKEDITOR.instances['cke-{$this->id}'].on('change', function(e) {
                CKEDITOR.instances['cke-{$this->id}'].updateElement();
            });
        ";

        return parent::render();
    }
}