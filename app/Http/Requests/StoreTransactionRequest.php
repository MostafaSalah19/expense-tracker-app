<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
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


    protected function prepareForValidation(): void
    {
        if(blank($this->input('date'))) {
            $this->merge(['date'=>today()->toDateString()]);
        }
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'amount' => ['required', 'decimal:0,2', 'min:0.01', 'max:9999999999.99'],
            'category' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:income,expense'],
            'date'     => ['required', 'date_format:Y-m-d'],
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'An amount is required.',
            'amount.decimal' => 'The amount can have at most 2 decimal places.',
            'category.required' => 'A category is required.',
            'type.required' => 'A type is required.',
            'type.in' => 'The type must be income or expense.',
        ];
    }
}
