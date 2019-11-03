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
    public function __construct(Request $request)
    {
        if($request->min_price) \Session::put('min_price', $request->min_price);
        if($request->max_price) \Session::put('max_price', $request->max_price);
        if($request->size) \Session::put('size', $request->size);
        if($request->color) \Session::put('color', $request->color);
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
        $products = Product::feature(10)->get();
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
    public function category(Request $request, $category_id)
    {
        //dd(\Session::get('color'));
        $rows = Category::where('type', 'gid')->get();
        $tree = Category::buildNested($rows);
        $category = Category::findOrFail($category_id);
        $products = Product::byCategory($category)->paginate(9);
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
        $banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        return view('category',[
            'categories'    => $tree,
            'category'    => $category,
            'products'  => $products,
            'sliders'   => $sliders,
            'banners'   => $banners,
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
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
        $banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        $product = Product::findOrFail($id);
        $products = $product->similar(10)->get();
		$top_sales = Product::topSales(9)->get();

        

        return view('product-detail',[
			'categories'	=> $tree,
            'products'  => $products,
            'sliders'   => $sliders,
			'banners'	=> $banners,
            'product'   => $product,
			'top_sales'	=> $top_sales,
		]);
    }
}
