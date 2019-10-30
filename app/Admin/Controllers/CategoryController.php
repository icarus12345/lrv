<?php

namespace App\Admin\Controllers;


use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use App\Admin\Controllers\AdminController;
use App\Admin\Traits\HasResourceActions;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    // use HasResourceActions;
    // use ModelForm;

    

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Category';

    

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function grid()
    {
        return Category::treeByType($this->request->type);
    }

    

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($type = null,$id  = null)
    {
        $show = new Show(Category::findOrFail($id??$type));

        $show->field('id', __('Id'));
        $show->parent_id(__('Parent id'))->as(function ($id) {
            return Category::findOrFail($id)->name;
        });
        $locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $show->field("name_{$locale}", trans('admin.title')."(".__("common.locales.{$locale}").")");
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

        $form = new Form(new Category);
        $form->display('id', 'ID');
        $form->hidden('type')->value($this->request->type);
        $form->select('parent_id', trans('admin.parent_id'))->options(Category::selectOptions(function($query){
            if($this->request->type) {
				return $query->where('type', $this->request->type);
			}
            return $query;
        }));
        $locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $form->text("name_{$locale}", trans('admin.title')."(".__("common.locales.{$locale}").")")->rules('required');
        }
        // $form->icon('icon', trans('admin.icon'))->default('fa-bars')->rules('required')->help($this->iconHelp());
        // $form->text('uri', trans('admin.uri'));
        // $form->multipleSelect('roles', trans('admin.roles'))->options($roleModel::all()->pluck('name', 'id'));
        // if ($form->model()->withPermission()) {
        //     $form->select('permission', trans('admin.permission'))->options($permissionModel::pluck('name', 'slug'));
        // }

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));
        return $form;
    }

    /**
     * Help message for icon field.
     *
     * @return string
     */
    protected function iconHelp()
    {
        return 'For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>';
    }
}
