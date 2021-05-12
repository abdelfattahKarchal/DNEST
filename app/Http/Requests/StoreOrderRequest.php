<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'confirm' => 'bail|required',
            'total_price' => 'required|numeric|min:1',
            'fname' => 'required',
            'lname' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'shipping_address' => 'required',
            'phone' => 'required',
        ];
    }
}
