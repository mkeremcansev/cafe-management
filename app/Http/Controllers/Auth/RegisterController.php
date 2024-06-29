<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(public Company $company, public User $user) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        $company = $this->company->create([
            'name' => $request->company_name,
            'email' => $request->company_email,
            'phone' => $request->company_phone,
            'address' => $request->company_address,
        ]);

        $company->users()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_owner' => true,
        ]);

        return redirect()->route('auth.login')->with('success', __('words.messages.success.register'));
    }
}
