<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$rows = Category::where('type', 'gid')->get();
		$tree = Category::buildNested($rows);
        $products = Product::feature()->offset(0)->limit(10)->get();
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
		$banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        return view('home',[
			'categories'	=> $tree,
            'products'  => $products,
            'sliders'   => $sliders,
			'banners'	=> $banners,
		]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $id)
    {
        $rows = Category::where('type', 'gid')->get();
		$tree = Category::buildNested($rows);
        $products = Product::feature()->offset(0)->limit(10)->get();
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
		$banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
		$product = Product::findOrFail($id);
        return view('product-detail',[
			'categories'	=> $tree,
            'products'  => $products,
            'sliders'   => $sliders,
			'banners'	=> $banners,
			'product'	=> $product,
		]);
    }
}
