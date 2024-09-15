<?php

namespace App\Http\Requests;

use App\Enums\CartUpdateType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCartRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

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
     * @see \Tests\Unit\Requests\UpdateCartRequestTest::all_attributes_must_be_validated_while_a_updating_cart()
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'integer', Rule::in(CartUpdateType::cases())],
        ];
    }
}
