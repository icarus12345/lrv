<?php

namespace App\Admin\Controllers;

use App\Models\Team;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TeamController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Team';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Team);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('position', __('Position'));
        $grid->column('image', __('Image'));
        $grid->column('fb_link', __('Fb link'));
        $grid->column('tw_link', __('Tw link'));
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
        $show = new Show(Team::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('position_vi', __('Position vi'));
        $show->field('position_en', __('Position en'));
        $show->field('image', __('Image'));
        $show->field('fb_link', __('Fb link'));
        $show->field('tw_link', __('Tw link'));
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
        $form = new Form(new Team);

        $form->text('name', __('Name'));
        $form->text('position_vi', __('Position vi'));
        $form->text('position_en', __('Position en'));
        $form->browse('image', __('Image'));
        $form->text('fb_link', __('Fb link'));
        $form->text('tw_link', __('Tw link'));

        return $form;
    }
}
