<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;

class OrderHistory extends BaseModel
{
    //
    protected $fillable = [
        'created_by',
        'header_id',  
        'title', 
        'message', 
        'type',
    ];


    public function created_admin()
    {
        return $this->hasOne(\Encore\Admin\Auth\Database\Administrator::class, 'id', 'created_by');
    }
}
