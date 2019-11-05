<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Exceptions\CustomException;
use App\Services\Cart;

class ShopController extends Controller
{
    protected $cart;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		$this->cart = new Cart();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addToCart(Request $request)
    {
		try {
            if($request->isMethod('post')){
                $product_id = $request->product_id;
                $color_id = $request->color_id;
                $size_id = $request->size_id;
                $this->cart->add($product_id, $size_id, $color_id );
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.add_to_cart_success'),
                        'view' => view('cart')->render()
                    ]);
            }
            

			// throw new \Exception('Loiox roi',1000);
		} catch (\Exception $e) {
			return response()->json([
                    'code'=>$e->getCode(),
                    'message'=> $e->getMessage()
                ]);
		}
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removeFromCart(Request $request)
    {
        try {
            if($request->isMethod('post')){
                $product_id = $request->product_id;
                $color_id = $request->color_id;
                $size_id = $request->size_id;
                $this->cart->remove($product_id, $size_id, $color_id );
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.remove_from_cart_success'),
                        'view' => view('cart')->render()
                    ]);
            }
            

            // throw new \Exception('Loiox roi',1000);
        } catch (\Exception $e) {
            return response()->json([
                    'code'=>$e->getCode(),
                    'message'=> $e->getMessage()
                ]);
        }
    }
}
