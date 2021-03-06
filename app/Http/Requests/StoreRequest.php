<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'vegetable_id' => 'required|integer',
            'address' => 'required|string|max:100',
            'price' => 'required|integer',
            'img_path' => 'mimes:jpeg,bmp,png,jpg',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ];
    }
}
