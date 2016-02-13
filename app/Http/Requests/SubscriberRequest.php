<?php

namespace App\Http\Requests;

class SubscriberRequest extends Request
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
        return [
//            'first_name' =>'required',
//            'url'=>'url',
//            'description',
            'email' => 'required|email|unique:subscribers'
//            'password_confirmation'=>'min:6'
        ];
    }
}
