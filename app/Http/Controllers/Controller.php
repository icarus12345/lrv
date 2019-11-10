<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Setting;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->flat_rate = Setting::getByName('flat_rate');
        $this->tax = Setting::getByName('tax');
        $this->data = [
            'flat_rate'    => $this->flat_rate,
            'tax'    => $this->tax,
        ];
    }

    public function setData($data) {
    	$this->data = array_merge($this->data, $data);
    }
}
