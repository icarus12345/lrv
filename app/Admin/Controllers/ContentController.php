<?php

namespace App\Admin\Controllers;

use App\Models\Content;
use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Content';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Content);

        $grid->model()->where('type', $this->request->type);

        $grid->column('id', __('Id'));
        $grid->column("title", __('Title'));
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
    protected function detail($type, $id = null)
    {
        $show = new Show(Content::findOrFail($id));

        $show->field('id', __('Id'));
        $locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $lang = "(".__("common.locales.{$locale}").")";
            $show->field("title_{$locale}", trans('admin.title').$lang)->rules('required');
        }
        // foreach ($locales as $locale) {
            // $show->field("desc_{$locale}", trans('Description')."(".__("common.locales.{$locale}").")")->rules('required');
        // }
        foreach ($locales as $locale) {
            $lang = "(".__("common.locales.{$locale}").")";
            $show->field("content_{$locale}", trans('Content').$lang)->rules('required');
        }
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
        $form = new Form(new Content);
        $form->hidden('type')->value($this->request->type);
        $locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $lang = "(".__("common.locales.{$locale}").")";
            $form->text("title_{$locale}", trans('admin.title').$lang)
                ->rules('required')
                ->disableHorizontal();
        }
        $form->image('image')
            ->disableHorizontal();
            // $form->textarea("desc_{$locale}", trans('admin.description').$lang)
                // ->rules('required')
                // ->disableHorizontal();
        foreach ($locales as $locale) {
            $lang = "(".__("common.locales.{$locale}").")";
            $form->ckeditor("content_{$locale}", __('Content').$lang)
                ->rules('required')
                ->disableHorizontal();
        }

        return $form;
    }
}
