<?php

namespace App\Workflows;

use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Services\Cart;
use App\Http\Requests\ProfileRequest;
use DB;


class ProfileUpdateWorkflow implements WorkflowInterface
{
    private $request;

    private $success;

    private $message;
    private $user;

    public function __construct(ProfileRequest $request)
    {
        $this->request = $request;
        $this->success = false;
    }

    public function run()
    {
        $user = \App\User::find(\Auth::user()->id);
        //DB::beginTransaction();
        try {
			$user->name = $this->request->name;
			$current_pwd = $this->request->current_pwd;
			$new_pwd = $this->request->new_pwd;
			$confirm_pwd = $this->request->confirm_pwd;
			if($this->request->current_pwd){
				if(\Hash::check($current_pwd, $user->password)){
					if($new_pwd == $confirm_pwd){
						$user->password = \Hash::make($new_pwd);
					}else{
						$this->message = __('account.password_does_not_match');
					}
				}else{
					$this->message = __('account.password_does_not_match');
					return;
				}
			}
            $user->save();
			$this->user = $user;
            //DB::commit();
            $this->success = true;
            $this->message = __('common.success');
            
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $this->message = $e->getMessage();
            //DB::rollback();
        }
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function succeeded()
    {
        return $this->success;
    }

    public function getResult()
    {
        return $this->user;
    }
}