<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => ['required', 'string', 'max:255'],
            'phone'=> ['required', 'string', 'min:11', 'max:13','regex:"^(\\+98|0)?9\\d{9}$"', Rule::unique('users', 'phone')->ignore($this->user_id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user_id)],
            'privilege'=>['required', 'in:0,1'],
            'password' => ['string', 'min:8', 'confirmed','nullable'],
            ];
        
    }
}
