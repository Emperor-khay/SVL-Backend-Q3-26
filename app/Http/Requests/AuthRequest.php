<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'fullname' => 'required|string|max:50',
            'email' => 'required|string|email',
            'password' => 'required|min:9|max:20',
            'password_confirmation' => 'required|same:password'
        ];
    }

     public function messages(){
        return[
            'fullname.required' => "Enter your Fullname",
            'password.min' => "Password must contain at least 10 letters"
        ];
    }
}
