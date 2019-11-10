<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            //'topic_type' => 'required',
            //'topic_id' => 'required|numeric',
            'first_name' => 'required',
            'last_name' => 'required',
            'street_address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode_zip' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ];
        return $rules;
    }
}
