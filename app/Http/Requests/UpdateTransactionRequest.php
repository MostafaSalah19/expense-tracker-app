<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
// use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends StoreTransactionRequest 
{
    protected function prepareForValidation(): void
    {

    }

    public function rules(): array
    {
        return array_merge(parent::rules(), [
            'date' => ['sometimes', 'required', 'date_format:Y-m-d'],
        ]);
    }
}
