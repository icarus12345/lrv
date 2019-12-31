<?php

namespace App\Admin\Controllers;

use App\Models\Setting;
use App\Admin\Controllers\AdminController;
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
        $grid->column('display', __('Name'));
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
        $show->field('display', __('Name'));
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
        $id = request()->route('setting');
        $setting = Setting::find($id);
        $form = new Form(new Setting);
        $form->display2('id', __('ID'));
        if($id){
            $form->display2('display', __('Name'));
        }else{
            $form->select2("type", trans('Type'))->options([
                'string'=>'String',
                'image'=>'Image',
                'text'=>'Text',
                'html'=>'Html',
            ]);
            $form->text2("display", trans('Display'));
            $form->text2("name", trans('Name'));
        }
        if($setting){

            if($setting->type == 'string'){
                $form->text2("value", trans('Value'));
            }elseif($setting->type == 'text'){
                $form->textarea2("value", trans('Value'));
            }if($setting->type == 'image'){
                $form->browse2("value", trans('Value'));
            }
        }else{
            $form->text2("value", trans('Value'));
        }
        $form->display2('created_at', __('Created At'));
        $form->display2('updated_at', __('Updated At'));
        $form->setView('admin.form');
        return $form;
    }
}
