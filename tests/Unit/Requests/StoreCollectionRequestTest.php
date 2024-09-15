<?php

namespace Tests\Unit\Requests;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use App\Http\Requests\StoreCollectionRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreCollectionRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreCollectionRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_collection(): void
    {
        $request = new StoreCollectionRequest();

        $this->assertEquals([
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
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
