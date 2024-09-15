<?php

namespace Tests\Unit\Requests;

use App\Enums\CollectionMethod;
use App\Enums\CollectionType;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class StoreUserRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\StoreUserRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_user(): void
    {
        $request = new StoreUserRequest();

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
