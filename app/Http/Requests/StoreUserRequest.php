<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required|unique:users|min:5',
            'phone' => 'required|min:13',
            'email' => 'required|unique:users',
            'country' => 'required',
            'region' => 'required',
            'district' => 'required',
            'status' => 'required',
            'photo' => 'nullable',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|required_with:password|same:password|min:6',
        ];
    }
}
