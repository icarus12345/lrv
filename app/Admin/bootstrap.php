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
Admin::css('/css/admin.css');
//Admin::js('/js/jquery-ui/jquery-ui.js');

use Encore\Admin\Form;
use Encore\Admin\Show;

Form::extend('ckeditor', \App\Admin\Extensions\Form\CKEditor::class);
Form::extend('browse', \App\Admin\Extensions\Form\Browse::class);
Form::extend('browses', \App\Admin\Extensions\Form\Browses::class);

Show::extend('browse', \App\Admin\Extensions\Show\Browse::class);
Show::extend('browses', \App\Admin\Extensions\Show\Browses::class);