<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (Router $router) {
    $router->get('/login', fn () => view('pages.auth.login'))->name('login');
    $router->post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
})->middleware('guest');

Route::name('dashboard.')->group(function (Router $router) {
    $router->get('/', fn () => view('pages.home'))->name('home');
    $router->resource('/categories', CategoryController::class)->except(['show']);
    $router->resource('/products', ProductController::class)->except(['show']);
})->middleware('auth:web');
