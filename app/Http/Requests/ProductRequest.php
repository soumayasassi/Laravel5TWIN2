<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products|max:20',
            'description' => 'required|max:255',
            'price' => 'required',
            'stock'=>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name is required',
            'description.required' => 'The product description is required',
        ];
    }
}
