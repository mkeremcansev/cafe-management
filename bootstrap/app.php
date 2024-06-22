<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
//        $middleware->web(append: [
//            Authenticate::class,
//            RedirectIfAuthenticated::class,
//        ]);
//        $middleware->redirectGuestsTo('login');
//        $middleware->redirectUsersTo('dashboard.home');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
