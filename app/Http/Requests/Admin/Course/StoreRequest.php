<?php

namespace App\Http\Requests\Admin\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name'=>'required||min:3',
            'text'=>'required||max:100',
            'description'=>'required',
            'free'=>'required||in:0,1',
            'price'=>'required_if:free,0',
            'length_time'=>'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:5000',
            'slug'=>['required', 'regex:/^[[a-zA-Z0-9\s -]+$/' , Rule::unique('courses','slug')]
        ];
    }
}
