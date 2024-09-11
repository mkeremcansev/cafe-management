<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\LoginRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\LoginRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_new_login_session(): void
    {
        $request = new LoginRequest();

        $this->assertSame([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
