<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;
class ArticleRequest extends Request
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
            'title' => 'required|min:7',
          'description'=>'required',
          'articleBody0'=>'required',
            'articleBody0'=>'required',
            'tags'=>'required',
        ];
        Log::info("exiting from request");
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'description.required' => 'Description is required',
            'articleBody0.required' => 'Article Body is required',
            'tags.required' => 'Select atleast one tag',
        ];
    }
}
