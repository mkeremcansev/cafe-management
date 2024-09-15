<?php

namespace Tests\Unit\Requests;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreTableRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreTableRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreTableRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_table(): void
    {
        $request = new StoreTableRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
