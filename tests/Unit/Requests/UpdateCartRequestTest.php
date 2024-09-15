<?php

namespace Tests\Unit\Requests;

use App\Enums\CartUpdateType;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateCartRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\UpdateCartRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_updating_cart(): void
    {
        $request = new UpdateCartRequest();

        $this->assertEquals([
            'type' => ['required', 'integer', Rule::in(CartUpdateType::cases())],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
