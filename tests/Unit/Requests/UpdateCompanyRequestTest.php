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

class UpdateCompanyRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\UpdateCompanyRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_updating_company(): void
    {
        $request = new UpdateCompanyRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
