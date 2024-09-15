<?php

namespace Tests\Unit\Requests;

use App\Enums\CartUpdateType;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateCategoryRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\UpdateCategoryRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_updating_category(): void
    {
        $request = new UpdateCategoryRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
