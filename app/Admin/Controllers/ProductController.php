<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Form\Tab;
use Illuminate\Http\Request;

class ProductController extends AdminController
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
    protected $title = 'App\Models\Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
		$model = new Product;
		$model->where('type', $this->request->type);
        $grid = new Grid($model);

        $grid->column('id', __('Id'));
        $grid->column("name", __('Title'));
        $grid->column("category.name", __('Category')); // Here is the point.
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
		
		$locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $show->field("name_{$locale}", trans('admin.title')."(".__("common.locales.{$locale}").")")->rules('required');
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
        $form = new Form(new Product);
        /*
		$form->select('category_id', trans('admin.parent_id'))->options(Category::selectOptions(function($query){
            if($this->request->type) return $query->where('type', $this->request->type);
            return $query;
        }));
		
		
		  
		$locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
            $form->text("name_{$locale}", trans('admin.title')."(".__("common.locales.{$locale}").")")->rules('required');
			$form->ckeditor("content_{$locale}", __('Content')."(".__("common.locales.{$locale}").")");
        }
		*/
        
        $tabs = $form->tab('Basic info', function ($form) {
			$form->hidden('type')->value($this->request->type);
			
		})->tab('Profile', function ($form) {

		   

		});
		$tabs->tab('Pictures', function ($form) {
			$form->multipleImage('pictures')->removable()->sortable();
		});
        

        return $form;
    }
}
