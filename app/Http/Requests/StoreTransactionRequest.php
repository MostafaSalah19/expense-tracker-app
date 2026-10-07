<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'Creator'  => ['required', 'exists:users,id'],
            'Amount'   => ['required', 'integer', 'min:1'],
            'Category' => ['required', 'string', 'max:255'],
            'Type'     => ['required', 'in:income,expense']
        ];
    }

    public function messages(): array
    {
        return [
            'Creator.required' => 'A Creator is required',
            'Amount.required' => 'A Amount is required',
            'Category.required' => 'A Category is required',
            'Type.required' => 'A Type is required',
        ];
    }
}
