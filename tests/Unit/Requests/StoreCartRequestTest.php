<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ReportFilterRequest;
use App\Http\Requests\StoreCartRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreCartRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreCartRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_cart(): void
    {
        $request = new StoreCartRequest();

        $this->assertEquals([
            'table_id' => 'required|integer|exists:tables,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
