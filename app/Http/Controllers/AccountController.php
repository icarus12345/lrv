<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Content;
use App\Http\Requests\ProfileRequest;
use App\Workflows\ContactWorkflow;
use App\Workflows\ProfileUpdateWorkflow;

class AccountController extends Controller
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
        
        return view('account.index', $this->data);
    }
	
	public function paymentMethod()
    {
        
        return view('account.payment-method', $this->data);
    }
	
	public function transaction(Request $request, $status = null)
    {
        $this->data['orders'] = \Auth::user()
			->orders()
			->byStatus($status)
			->paginate(10);
        return view('account.transaction', $this->data);
    }
	
	public function address()
    {
        
        return view('account.address', $this->data);
    }
	
	public function updateProfile(ProfileRequest $request)
    {
        try {
            $workflow = new ProfileUpdateWorkflow($request);
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
