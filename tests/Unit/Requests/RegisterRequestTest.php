<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\RegisterRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RegisterRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\RegisterRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_creating_a_new_user(): void
    {
        $request = new RegisterRequest();

        $this->assertSame([
            'company_name' => ['required', 'string', 'max:255'],
            'company_email' => ['required', 'string', 'email', 'max:255'],
            'company_phone' => ['required', 'string', 'max:255'],
            'company_address' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
