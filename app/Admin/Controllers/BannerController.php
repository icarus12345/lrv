<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner);
        $grid->model()->where('type', $this->request->type);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('image', __('Image'))->image('/', 60, 40);;
        $grid->column('link', __('Link'));
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
    protected function detail($type,$id = null)
    {
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name_vi', __('Name vi'));
        $show->field('name_en', __('Name en'));
        $show->field('desc_vi', __('Desc vi'));
        $show->field('desc_en', __('Desc en'));
        $show->field('image', __('Image'));
        $show->field('link', __('Link'));
        $show->field('type', __('Type'));
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
        $form = new Form(new Banner);

        $form->text('name_vi', __('Name vi'));
        $form->text('name_en', __('Name en'));
        $form->text('desc_vi', __('Desc vi'));
        $form->text('desc_en', __('Desc en'));
        $form->image('image', __('Image'));
        $form->url('link', __('Link'));
        $form->hidden('type')->value($this->request->type);

        return $form;
    }
}
