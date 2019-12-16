<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;

use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Form\Tab;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Facades\Admin;

class ProductController extends AdminController
{
    
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

	public function apiDetail(Request $request, $id){
		return response()->json([
			"result"=> true,
			"data"=> Product::with(['colors','sizes'])->find($id)
		]);
	}
	public function apiList(Request $request){
		$perpage = $request->perPage??10;
		$sort_column = $request->sortColumn??'id';
		$sort_ascending = $request->sortAscending=="true"?'asc':'desc';
		$filter = $request->filter??null;
		$id = $request->id??null;
		$rows = Product::with(['category'])
			->filter($filter)
			->sort($sort_column, $sort_ascending)
			->paginate($perpage);
		return response()->json([
			"result"=> true,
			"data"=> [
				"selected"=> Product::find($id),
				"contents"=> $rows->getCollection(),
				"pagination"=> [
					"page"=> $rows->currentPage(),
					"totalCount"=> $rows->total()
				]
			]
		]);
	}

	// public function apiUpdate(Request $request, $id){
	// 	$params = $request->params;
	// 	$product = Product::find($id);
	// 	if($product){
	// 		$product->fill($params);
	// 		if($product->save()){
	// 			return response()->json([
	// 				"result"=> true,
	// 			]);
	// 		}
	// 	}
	// 	return response()->json([
	// 		"result"=> false
	// 	]);
	// }
	
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
		if(!$this->request->_export_){

			return view('admin.page.demo.grid');//->render();
		}
        $grid = new Grid(new Product);
		$grid->model()->where('type', $this->request->type);

        $grid->column('id', __('Id'));
        $grid->column("name", __('Title'));
        $grid->column("category.name", __('Category')); // Here is the point.
        //$grid->label()->editable('select', ['' => 'None', 'new' => 'New', 'hot' => 'Hot', 'sale' => 'Sale']);
		$grid->column('labels')->label();
        $grid->price()->editable();
        $grid->instock()->editable();
        $grid->discount()->editable();
        $grid->tags()->label();
		$grid->column('created_at', __('Created at'))
			->hide();
		$grid->column('updated_at', __('Updated at'))
			->hide();

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
			$lang = "(".__("common.locales.{$locale}").")";
            $show->field("name_{$locale}", trans('admin.title').$lang)->rules('required');
        }
		$show->image()->browse();
		$show->pictures()->browses();
		$show->price();
        foreach ($locales as $locale) {
			$lang = "(".__("common.locales.{$locale}").")";
            $show->field("desc_{$locale}", trans('Description').$lang)->rules('required');
        }
		foreach ($locales as $locale) {
			$lang = "(".__("common.locales.{$locale}").")";
            $show->field("content_{$locale}", trans('Content').$lang)->typho();
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
		$form->column(6, function($form){
			$form->select2('category_id', trans('Category'))
				->attribute([
					'required'=>'',
				])
				->options(Category::selectOptions(function($query){
					if($this->request->type) return $query->where('type', $this->request->type);
					return $query;
				}));
				// ->disableHorizontal();
		});
		$form->column(6, function($form){
			/*
			$form->select('label', 'Label')
				->options(['' => 'None', 'new' => 'New', 'hot' => 'Hot'])
				->disableHorizontal();
			*/
			$form->checkbox2('labels')
				->options([
					'new' => 'New',
					'hot' => 'Hot',
					'sale' => 'Sale',
				])
				->disableHorizontal();
		});
		  
        $locales = \Config::get('app.locales');
        foreach ($locales as $locale) {
			$lang = "(".__("common.locales.{$locale}").")";
			$form->column(6, function($form) use ($locale,$lang) {
				$form->text2("name_{$locale}", trans('admin.title').$lang)
					->rules('required')
					->attribute([
						'required'=>'',
					]);
					// ->disableHorizontal();
				$form->textarea2("desc_{$locale}", trans('admin.description').$lang)
					->rows(2)
					->rules('required')
					->attribute([
						'required'=>'',
					]);
					// ->disableHorizontal();
				$form->ckeditor2("content_{$locale}", __('Content').$lang)
					->rules('required')
					->attribute([
						'required'=>'',
					]);
					// ->disableHorizontal();
			});
        }
		$form->column(2, function($form){
			$form->text2('price', 'Price')
				// ->min(10)
				->rules(['required','numeric'])
				->attribute([
					'required'=>'',
					'pattern' => "^([1-9][0-9]{0,8}([.][0-9]{1,2})?)|^(0.[0-9]{1,2})|0",
				]);
				// ->disableHorizontal();
		});
		$form->column(2, function($form){
			$form->text2('instock', 'Instock')
				// ->min(0)
				->attribute([
					'required'=>'',
					'pattern' => "^(-?[1-9][0-9]{0,4}?)$|0",
				]);
				// ->disableHorizontal();
		});
        $form->column(2, function ($form) {
			$form->text2('discount', 'Discount')
				// ->min(0)
				->attribute([
					'required'=>'',
					'pattern' => "^([1-9][0-9]{0,1})|100|0"
				]);
				// ->max(100)
				// ->disableHorizontal();
		});
        $form->column(6, function($form){
			$form->tags2('tags')
				->disableHorizontal();
		});
		$form->column(12, function($form){
			$form->browse('image')
				->disableHorizontal();
		});
		$form->column(12, function($form){
			$form->browses('pictures')
				//->removable()
				//->sortable()
				->disableHorizontal();
        });
		$form->column(6, function($form){
			// $field = $form->table('colors','Colors', function ($form) {

			// 	$form->text('color','Color');

			// })
			// ->with(function($value,$field){
			// 	$field->setView('admin.form.hasmanytable');
			// 	return $value;
			// })
			// ->disableHorizontal();
			$form->multipleSelect2('colors')
				->options(Color::pluck('name', 'id'))
				->disableHorizontal();
		});
		$form->column(6, function($form){
		// 	$field = $form->table('sizes','Sizes', function ($form) {

				
		// 		$form->text('size', 'Size');

		// 	})
		// 	->with(function($value,$field){
		// 		$field->setView('admin.form.hasmanytable');
		// 		return $value;
		// 	})
		// 	->disableHorizontal();
			$form->multipleSelect2('sizes')
				->options(Size::pluck('name', 'id'))
				->disableHorizontal();
		});
		$form->setView('admin.form');
        return $form;
    }
}
