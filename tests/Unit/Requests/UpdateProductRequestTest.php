<?php

namespace Tests\Unit\Requests;

use App\Enums\CartUpdateType;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateProductRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\UpdateProductRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_updating_product(): void
    {
        $request = new UpdateProductRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'category_id' => ['required', 'exists:categories,id'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
