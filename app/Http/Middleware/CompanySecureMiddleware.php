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

        if (
            (
                $request->routeIs('dashboard.tables.create') ||
                $request->routeIs('dashboard.tables.store') ||
                $request->routeIs('dashboard.tables.index') ||
                $request->routeIs('dashboard.tables.edit') ||
                $request->routeIs('dashboard.tables.update') ||
                $request->routeIs('dashboard.tables.destroy')
            )
            &&
            ($user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        if (
            (
                $request->routeIs('dashboard.products.create') ||
                $request->routeIs('dashboard.products.store') ||
                $request->routeIs('dashboard.products.index') ||
                $request->routeIs('dashboard.products.edit') ||
                $request->routeIs('dashboard.products.update') ||
                $request->routeIs('dashboard.products.destroy')
            )
            &&
            ($user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        if (
            (
                $request->routeIs('dashboard.categories.create') ||
                $request->routeIs('dashboard.categories.store') ||
                $request->routeIs('dashboard.categories.index') ||
                $request->routeIs('dashboard.categories.edit') ||
                $request->routeIs('dashboard.categories.update') ||
                $request->routeIs('dashboard.categories.destroy')
            )
            &&
            ($user->is_owner === false)
        ) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        if ($request->routeIs('dashboard.reports') && $user->is_owner === false) {
            return redirect()->route('dashboard.home')->with('error', __('words.messages.error.not_allowed_access'));
        }

        return $next($request);
    }
}
