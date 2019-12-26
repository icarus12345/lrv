<?php

namespace App\Admin\Controllers;

use App\Models\Color;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class ColorController extends AdminController
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
		return Color::select(['name as text', 'id'])->get();
		return response()->json([
			"result"=> true,
			"data"=> $rows
		]);
    }
}
