<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateImageRequest extends FormRequest
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
            'image1' => 'nullable|image|mimes:jpeg,jpg,png|dimensions:width=438,height=438',
            'image2' => 'nullable|image|mimes:jpeg,jpg,png|dimensions:width=1000,height=1000',
        ];
    }
}
