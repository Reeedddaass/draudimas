<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'reg_number' => ['required', 'string', 'regex:/^[A-Z]{3}[0-9]{3}$/', 'unique:cars,reg_number'],
            'brand' => ['required', 'string', 'max:50'],
            'model' => ['required', 'string', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'reg_number.required' => __('Registration number is required.'),
            'reg_number.regex' => __('Registration number format is invalid. Use uppercase letters (AAA111).'),
            'reg_number.unique' => __('This registration number already exists.'),
            'brand.required' => __('Car brand is required.'),
            'model.required' => __('Car model is required.')
        ];
    }
}
