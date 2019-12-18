<?php

namespace App\Admin\Controllers;

use App\Models\Warehouse;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class WarehouseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Warehouse';

    public function avaiable(Request $request){
        $product_id = $request->product_id;
        $qty = $request->qty;
        $rows = Warehouse::whereHas('inventories', function ($query) use($product_id, $qty) {
                $query->where('product_id', $product_id)
                    ->where('qty','>=', $qty);
            })
            ->get();
		return response()->json([
			"result"=> true,
			"data"=> $rows,
		]);
    }
    public function list(Request $request){
		$perpage = $request->perPage??10;
		$sort_column = $request->sortColumn??'id';
		$sort_ascending = $request->sortAscending=="true"?'asc':'desc';
		$filter = $request->filter??null;
		$rows = Warehouse::filter($filter)
			->orderBy($sort_column, $sort_ascending)
			->paginate($perpage);
		return response()->json([
			"result"=> true,
			"data"=> [
				"contents"=> $rows->getCollection(),
				"pagination"=> [
					"page"=> $rows->currentPage(),
					"totalCount"=> $rows->total()
				]
			]
		]);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Warehouse);

        $grid->column('id', __('Id'));
        $grid->column('location.name', __('Location'));
        $grid->column('name', __('Name'));
        $grid->column('address', __('Address'));
        $grid->column('lat', __('Lat'));
        $grid->column('lon', __('Lon'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Warehouse::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('location_id', __('Location id'));
        $show->field('name', __('Name'));
        $show->field('address', __('Address'));
        $show->field('lat', __('Lat'));
        $show->field('lon', __('Lon'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Warehouse);

        $form->select2('location_id', __('Location id'))
            ->options(\App\Models\Location::all()->pluck('name', 'id'));
        $form->text2('name', __('Name'));
        $form->text2('address', __('Address'));
        $form->text2('lat', __('Lat'));
        $form->text2('lon', __('Lon'));
        $form->text2('status', __('Status'))->default('Active');

        return $form;
    }
}
