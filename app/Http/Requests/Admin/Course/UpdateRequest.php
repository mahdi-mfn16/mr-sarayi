<?php

namespace App\Http\Requests\Admin\Course;

use App\Rules\ImageExistRule;
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
            'description'=>'required',
            'free'=>'required||in:0,1',
            'price'=>'required_if:free,0',
            'length_time'=>'required',
            'image' => ['required_unless:old_image,'.$this->course_id, 'mimes:jpeg,jpg,png,gif','max:5000'],
            // 'old-image'=>[new ImageExistRule($this->course_id, 'courses')],
            'slug'=>['required', 'regex:/^[[a-zA-Z0-9\s -]+$/' , Rule::unique('courses','slug')->ignore($this->course_id)]    
        ];
    }
}
