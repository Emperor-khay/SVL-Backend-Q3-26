<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'name' => ['max:20', 'min:10', 'required'],
            'model' => ['required'],
            'year' => ['required'],
            'price' => ['required'],
            'status' => ['required'],
            'colour' => ['required'],
        ];
    }

    public function messages(){
        return[
            'name.required' => "Car Name cannot be empty",
            'name.min' => "Car Name must contain at least 10 letters"
        ];
    }
}
