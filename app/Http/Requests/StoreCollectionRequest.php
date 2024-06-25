<?php

namespace App\Http\Requests;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCollectionRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'table_id' => [
                'required',
                'integer',
                'exists:tables,id',
            ],
            'type' => [
                'required',
                'integer',
                Rule::in(CollectionType::cases()),
            ],
            'method' => [
                'required',
                'integer',
                Rule::in(CollectionMethod::cases()),
            ],
            'amount' => [
                'required_if:type,'.CollectionType::MANUEL->value,
                'integer',
            ],
            'products' => [
                'required_if:type,'.CollectionType::PRODUCT_COLLECTION->value,
                'array',
                'min:1',
            ],
            'products.*.product_id' => [
                'required_if:type,'.CollectionType::PRODUCT_COLLECTION->value,
                'integer',
                'exists:products,id',
            ],
            'products.*.quantity' => [
                'required_if:type,'.CollectionType::PRODUCT_COLLECTION->value,
                'integer',
                'min:1',
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ((int) $this->type === CollectionType::MANUEL->value) {
            $this->merge([
                'amount' => (int) clean_masked_money($this->amount),
            ]);
        }
    }
}
