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
        parent::__construct();
        if($request->isMethod('post')){
            if($request->min_price) \Session::put('min_price', $request->min_price);
            if($request->max_price) \Session::put('max_price', $request->max_price);
            \Session::put('size', $request->size);
            \Session::put('color', $request->color);
            \Session::put('categories', $request->categories);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$colors = \Session::get('color');
		$min_price = \Session::get('min_price');
		$max_price = \Session::get('max_price');
		$categories = \Session::get('categories');
        $products = Product::newest()
			->categoryIn($categories)
			->colorIn($colors)
			->priceIn($min_price, $max_price)
			->paginate(9);
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
        $banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        $this->setData([
            'products'  => $products,
            'sliders'   => $sliders,
            'banners'   => $banners,
        ]);
        return view('shop', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category(Request $request, $category_id)
    {
		$colors = \Session::get('color');
		$min_price = \Session::get('min_price');
		$max_price = \Session::get('max_price');
        $products = Product::newest()
			->byCategory($category)
			->colorIn($colors)
			->priceIn($min_price, $max_price)
			->paginate(9);
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
        $banners = Banner::where('type','banner')->offset(0)->limit(5)->get();

        $this->setData([
            'products'  => $products,
            'sliders'   => $sliders,
            'banners'   => $banners,
        ]);
        return view('shop', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(Request $request, $id)
    {
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
        $banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        $product = Product::findOrFail($id);
        $products = $product->similar(10)->get();
		$top_sales = Product::topSales(9)->get();

        $this->setData([
            'products'  => $products,
            'sliders'   => $sliders,
            'banners'   => $banners,
            'product'   => $product,
            'top_sales' => $top_sales,
        ]);

        return view('product-detail', $this->data);
    }
}
