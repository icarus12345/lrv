<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'name' => 'required',
            //'email' => 'required|email',
            'current_pwd' => ['nullable','min:8','max:255'],
            'new_pwd' => ['nullable','min:8','max:255'],
            'confirm_pwd' => ['nullable','same:new_pwd'],
        ];
        return $rules;
    }
}
