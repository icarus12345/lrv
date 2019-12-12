<?php

namespace App\Admin\Extensions\Form2;

use Encore\Admin\Form\Field\Textarea;

class CKEditor2 extends Textarea
{
    public static $js = [
        // '/packages/ckeditor/ckeditor.js',
        // '/packages/ckeditor/adapters/jquery.js',
        'https://cdn.ckeditor.com/ckeditor5/16.0.0/decoupled-document/ckeditor.js',
        // 'https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js'
    ];

    protected $view = 'admin.form2.ckeditor';

    public function render()
    {
        $ckfinderUrl = route('ckfinder_connector');
        $this->script = "
            
            /*
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
                document.getElementById('cke-{$this->id}').oninput()
            });
            */
            /*
            CKEDITOR.replace( 'cke-{$this->id}', {
                filebrowserBrowseUrl: '".route('ckfinder_browser')."',
                'toolbar': [
                    // ['ShowBlocks', 'Image'],
                    // ['NumberedList', 'BulletedList'],['Outdent', 'Indent'],['Link', 'Unlink'],
                    // ['JustifyLeft', 'JustifyCenter'], ['JustifyRight', 'JustifyBlock'],
                    // ['Format'], ['TextColor', 'BGColor'],
                    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
                    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'links', items: [ 'Link', 'Unlink' ] },
                    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
                    { name: 'insert', items: [ 'Image', 'Table' ] },
                ],
                height: 'calc(100vh - 200px)'
            } );
            */
            CKFinder.config( { connectorPath: '/ckfinder/connector' } );
            document.querySelector('#form-group-{$this->id}')
                .querySelector('.document-editor-preview')
                .addEventListener('click', function(){
                    $('#document-editor-{$this->id}').addClass('document-editor-show');
                    $('body').addClass('has-document-editor-show');
                });
            DecoupledEditor
                .create( document.querySelector( '#cke-{$this->id}' ), {
                    toolbar:{
                        items:[
                            'undo','redo',
                            '|',
                            'heading',
                            '|',
                            'fontsize','fontfamily',
                            '|',
                            'bold','italic','underline','strikethrough','highlight',
                            '|',
                            'alignment',
                            '|',
                            'numberedList','bulletedList',
                            '|',
                            'indent','outdent',
                            '|',
                            'link','blockquote','imageUpload','ckfinder','insertTable','mediaEmbed',
                        ]
                    },
                    image:{
                        styles:['full','alignLeft','alignRight'],
                        toolbar:[
                            'imageStyle:alignLeft','imageStyle:full','imageStyle:alignRight',
                            '|',
                            'imageTextAlternative'
                        ]
                    
                    },
                    table:{
                        contentToolbar:['tableColumn','tableRow','mergeTableCells']
                    
                    },
                    ckfinder: {
                        // Open the file manager in the pop-up window.
                        uploadUrl: '{$ckfinderUrl}?command=QuickUpload&type=Images&responseType=json',
                        options: {
                            resourceType: 'Images'
                        }
                    }
                })
                 .then( editor => {
                     let toolbarContainer = document.querySelector( '#toolbar-container-{$this->id}' );
                    console.log(editor)
                     toolbarContainer.appendChild( editor.ui.view.toolbar.element );
                     editor{$this->id} = editor
                 } )
                .catch( error => {
                    console.error( error );
                } );
            var editor{$this->id};
            document.getElementById('document-editor-{$this->id}').onclick = function(e){
                console.log(e.target, e.target.classList)
                if(e.target.classList.contains('document-editor')){
                    $('body').removeClass('has-document-editor-show');
                    $('#document-editor-{$this->id}').removeClass('document-editor-show')
                    $('#textarea-{$this->id}').val(editor{$this->id}.getData());
                    $('#form-group-{$this->id} .document-editor-preview').html(editor{$this->id}.getData());
                }
            }
        ";

        return parent::render();
    }
}