<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2'],
            'price' => ['required', 'numeric'],
            'type_id' => ['required', 'exists:types,id'],
        ];
    }

    /**
     * Get the validation messages that we get in response.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'type_id.required' => 'The type field is required.',
            'type_id.exists' => 'The selected type is invalid.'
        ];
    }
}
