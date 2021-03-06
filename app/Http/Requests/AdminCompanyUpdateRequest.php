<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminCompanyUpdateRequest extends FormRequest
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
            'userId'=>'numeric|required',
            'id'=>'numeric|required',
            'name' => 'required|min:2',
            'email' => 'required|email|unique:companies,email,'.array_slice(explode('/', Request::path()), -1)[0],
            'telephone' => 'required|numeric|min:100000000',
            'schedule' => 'required|date_format:"H:i',
            'address' => 'required|min:6',
        ];
    }
}
