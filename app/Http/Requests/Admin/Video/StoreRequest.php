<?php

namespace App\Http\Requests\Admin\Video;

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
            'show_name'=>'required||min:10',
            'episode'=>['required', Rule::unique('videos','episode')->where(fn ($query) => $query->where('course_id', $this->course_id))],
            'length_time'=>'required',
            'video'=>['required','mimes:mp4,mkv,avi','max:100000'],
            ];
    }
}
