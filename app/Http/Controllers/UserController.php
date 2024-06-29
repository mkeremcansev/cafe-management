<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public ?Company $company = null;

    public function __construct(public User $user)
    {
        $this->company = auth()->user()->company;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.user.index')->withUsers(
            $this->user->where('company_id', auth()->user()->company_id)->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        if (
            $this->company->users()->count() === (int) config('app.default_max_company_user') &&
            in_array(auth()->user()->email, config('app.premium_users'), true) === false
        ) {
            return back()->with('error', __('words.messages.error.validations.default_max_company_user', ['limit' => config('app.default_max_company_user')]));
        }

        $this->company->users()->create($request->validated());

        return back()->with('success', __('words.messages.success.user.created'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('pages.user.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return back()->with('success', __('words.messages.success.user.updated'));
    }
}
