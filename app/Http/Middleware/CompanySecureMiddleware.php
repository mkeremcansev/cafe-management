<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanySecureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (
            ($request->routeIs('dashboard.companies.edit') || $request->routeIs('dashboard.companies.update'))
            &&
            ($user->company_id !== $request->route('company')?->id || $user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        if (
            ($request->routeIs('dashboard.users.create') || $request->routeIs('dashboard.users.store') || $request->routeIs('dashboard.users.index'))
            &&
            ($user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        if (
            ($request->routeIs('dashboard.users.edit') || $request->routeIs('dashboard.users.update'))
            &&
            ($user->company_id !== $request->route('user')?->company_id || $user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        return $next($request);
    }
}
