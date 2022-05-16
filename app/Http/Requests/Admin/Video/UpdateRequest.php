<?php

namespace App\Http\Requests\Admin\Video;

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
            'show_name'=>'required||min:10',
            'episode'=>['required', Rule::unique('videos','episode')->where(fn ($query) => $query->where('course_id', $this->course_id))->ignore($this->video_id)],
            'length_time'=>'required',
            'video'=>['required_unless:old_video,'.$this->video_id,'mimes:mp4,mkv,avi','max:100000'],
            ];
        
    }
}
