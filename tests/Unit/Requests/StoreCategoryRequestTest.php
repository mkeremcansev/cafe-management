<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ReportFilterRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\StoreCategoryRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreCategoryRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreCategoryRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_category(): void
    {
        $request = new StoreCategoryRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
