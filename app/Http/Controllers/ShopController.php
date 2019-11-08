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
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('cart.home', $this->data);
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function checkout()
    {
        return view('cart.checkout', $this->data);
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
                $quanlity = $request->quanlity;
                $this->cart->add($product_id,$quanlity, $size_id, $color_id );
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.add_to_cart_success'),
                        'view' => view('cart.cart-widget')->render()
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
    public function updateToCart(Request $request)
    {
        try {
            if($request->isMethod('post')){
                $key = $request->key;
                $quanlity = $request->quanlity;
                $this->cart->update($key, $quanlity );
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.update_to_cart_success'),
                        'view' => view('cart.cart-widget')->render(),
                        'form' => view('cart.cart-form')->render(),
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
                $key = $request->key;
                $this->cart->remove($key);
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.remove_from_cart_success'),
                        'view' => view('cart.cart-widget')->render(),
                        'form' => view('cart.cart-form')->render(),
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
    public function updateShipingType(Request $request)
    {
        // try {
            if($request->isMethod('post')){
                $flat_rate = $request->flat_rate;
                $this->cart->setShipingType($flat_rate);
                return response()->json([
                        'code'=> 1,
                        'message'=> __('cart.update_shiping_type_success'),
                        // 'view' => view('cart.cart-widget')->render(),
                        'form' => view('cart.cart-form')->render(),
                    ]);
            }
            

            // throw new \Exception('Loiox roi',1000);
        // } catch (\Exception $e) {
        //     return response()->json([
        //             'code'=>$e->getCode(),
        //             'message'=> $e->getMessage()
        //         ]);
        // }
    }
}
