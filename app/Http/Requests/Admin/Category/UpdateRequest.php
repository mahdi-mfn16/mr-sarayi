<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
                'slug'=>['required', 'regex:/^[[a-zA-Z0-9\s -]+$/' , Rule::unique('categories','slug')->ignore($this->category_id)],
                'image' => ['required_unless:old_image,'.$this->category_id, 'mimes:jpeg,jpg,png,gif','max:5000'],
            ];
    }
}
