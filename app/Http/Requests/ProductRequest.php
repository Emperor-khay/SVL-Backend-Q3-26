<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'productname' => ['required', 'string', 'max:2'],
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ];
    }

    public function messages() {

        return [
            'productname.required' => "Please Enter A Product Name",
            'qty.numeric' => "Product Quantity must be a number"
        ];
    }
}
