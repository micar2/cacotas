<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class AdminUserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->rol=='admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.array_slice(explode('/', Request::path()), -1)[0],
            'telephone' => 'required|numeric|min:100000000',
            'password' => '',
            'password_confirmation' => 'same:password',
            'rol'=>'required|exists:users,rol',
        ];
    }
}
