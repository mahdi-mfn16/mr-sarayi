<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => ['required', 'string', 'max:255'],
            'phone'=> ['required', 'string', 'min:11', 'max:13', 'unique:users','regex:"^(\\+98|0)?9\\d{9}$"'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'privilege'=>['required', 'in:0,1'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
    }
}
