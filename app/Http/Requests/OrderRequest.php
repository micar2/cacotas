<?php

namespace App\Http\Requests;

use App\Rules\MinTomorrow;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'deliverDate' => ['require','date_format:"d/m/Y"', new MinTomorrow()],
        ];
    }
}
