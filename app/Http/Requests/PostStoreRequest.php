<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
    public function messages()
    {
        if(request()->isMethod('post')){
            return[
                'image' => 'required|string|mimes:jpeg,png,gif,svg |max:2048',
            ];
        }
        else{
            return[
                'image' => 'required|string|mimes:jpeg,png,gif,svg |max:2048',
            ];
        }
    }
}
