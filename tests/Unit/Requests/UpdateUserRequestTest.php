<?php

namespace Tests\Unit\Requests;

use App\Enums\CartUpdateType;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UpdateUserRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\UpdateUserRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_updating_user(): void
    {
        $request = new UpdateUserRequest();

        $user = User::factory()->create();

        $request->user = $user;

        $this->assertEquals([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'min:8'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
