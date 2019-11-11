<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Content;
use App\Http\Requests\ContactRequest;
use App\Workflows\ContactWorkflow;
class HomeController extends Controller
{
    public $data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::feature()->offset(0)->limit(10)->get();
        $sliders = Banner::where('type','slider')->offset(0)->limit(5)->get();
		$banners = Banner::where('type','banner')->offset(0)->limit(5)->get();
        $this->setData([
            'products'  => $products,
            'sliders'   => $sliders,
            'banners'   => $banners,
        ]);
        return view('home', $this->data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function demo()
    {
        return view('home');
    }
	
	public function locale(string $locale)
    {
        if (!in_array($locale, \Config::get('app.locales'))) {
            // Set default locale;
            $locale = \Config::get('app.locale');
        }

        \Session::put('locale', $locale);

        return redirect()->back();
    }
	
	public function currency(string $currency)
    {
        
        \Session::put('currency', $currency);

        return redirect()->back();
    }

    public function about(){
        $this->data['content'] = Content::findOrFail(1);
        return view('about',$this->data);
    }

    public function contact(){
        return view('contact',$this->data);
    }
	
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendRequest(ContactRequest $request)
    {
        try {
            $workflow = new ContactWorkflow($request);
            $workflow->run();
            if($workflow->succeeded()) {

                return response()->json([
                        'code'=> 1,
                        'message'=> __('common.success'),
                        'data' => $workflow->getResult(),

                    ]);
            }else{
                return response()->json([
                    'code'=>  -1,
                    'message'=> $workflow->getMessage()
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
