<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class PostController extends AdminController
{
    /**
     * Create a new grid model instance.
     *
     * @param EloquentModel $model
     * @param Grid          $grid
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Post';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
		$model = new Post;
		$model->where('type', $this->request->type);
        $grid = new Grid($model);

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('category.name', __('Category')); // Here is the point.
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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
		
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
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
        $form = new Form(new Post);
        $form->hidden('type')->value($this->request->type);
        $form->text('title', __('Title'));
        $form->select('category_id', trans('admin.parent_id'))->options(Category::selectOptions(function($query){
            if($this->request->type) $query->where('type', $this->request->type);
            return $query;
        }));
        $form->ckeditor('content', __('Content'));

        $form->hasMany('comments', function (Form\NestedForm $form) {
            $form->text('content');
        });

        return $form;
    }
}
