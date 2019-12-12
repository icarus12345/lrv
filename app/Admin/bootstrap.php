<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map', 'editor']);
Admin::js('/vendor/chart.js/dist/Chart.min.js');
// Admin::js('https://cdn.ckeditor.com/ckeditor5/16.0.0/decoupled-document/ckeditor.js');
Admin::css('/css/admin.css');
Admin::js('/js/admin.js');

use Encore\Admin\Form;
use Encore\Admin\Show;

Form::extend('ckeditor', \App\Admin\Extensions\Form\CKEditor::class);
Form::extend('browse', \App\Admin\Extensions\Form\Browse::class);
Form::extend('browses', \App\Admin\Extensions\Form\Browses::class);

Show::extend('browse', \App\Admin\Extensions\Show\Browse::class);
Show::extend('browses', \App\Admin\Extensions\Show\Browses::class);

Form::extend('text2', \App\Admin\Extensions\Form2\Text2::class);
Form::extend('select2', \App\Admin\Extensions\Form2\Select2::class);
Form::extend('checkbox2', \App\Admin\Extensions\Form2\Checkbox2::class);
Form::extend('textarea2', \App\Admin\Extensions\Form2\Textarea2::class);
Form::extend('number2', \App\Admin\Extensions\Form2\Number2::class);
Form::extend('tags2', \App\Admin\Extensions\Form2\Tags2::class);
Form::extend('multipleSelect2', \App\Admin\Extensions\Form2\MultipleSelect2::class);
Form::extend('ckeditor2', \App\Admin\Extensions\Form2\CKEditor2::class);