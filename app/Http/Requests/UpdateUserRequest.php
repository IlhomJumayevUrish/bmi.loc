<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'fio' => 'required|min:4',
            'username' => ['required', Rule::unique('users')->ignore($this->id)],
            'phone' => 'required|min:13',
            'email' =>['required',Rule::unique('users')->ignore($this->id)],
            'country' => 'required',
            'region' => 'required',
            'district' => 'required',
            'status' => 'required',
            'photo' => 'nullable',
            'password' => 'nullable|min:6',
            'password_confirmation' => 'nullable|required_with:password|same:password|min:6',
        ];
    }
}
