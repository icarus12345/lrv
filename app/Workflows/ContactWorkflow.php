<?php

namespace App\Workflows;

use App\Http\Requests\ContactRequest;
use DB;
use App\Notifications\MailContactRequestNotification;

class ContactWorkflow implements WorkflowInterface
{
    private $request;

    private $success;


    private $message;

    public function __construct(ContactRequest $request)
    {
        $this->request = $request;
        $this->success = false;
    }

    public function run()
    {
        
        //DB::beginTransaction();
        try {

        
            //DB::commit();
            $this->success = true;
            $this->message = __('common.success');
            \Notification::route('mail', config('mail.notification.address'))
                ->notify(new MailContactRequestNotification($this->request));

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
        return $this->request;
    }
}