<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SettingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Setting';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Setting);
        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('value', __('Value'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Setting::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('value', __('Value'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Setting);

        $form->display('id', __('ID'));
        $form->text("name", trans('Name'));
        $form->text("value", trans('Value'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
