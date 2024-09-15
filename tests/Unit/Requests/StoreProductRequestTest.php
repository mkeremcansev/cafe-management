<?php

namespace Tests\Unit\Requests;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreProductRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreProductRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_product(): void
    {
        $request = new StoreProductRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
