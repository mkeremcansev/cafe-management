<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TableController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->group(function (Router $router) {
    $router->get('/login', fn () => view('pages.auth.login'))->name('login');
    $router->post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
})->middleware('guest');

Route::name('dashboard.')->group(function (Router $router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->resource('/categories', CategoryController::class)->except(['show']);
    $router->resource('/products', ProductController::class)->except(['show']);
    $router->resource('/tables', TableController::class);
    $router->resource('/carts', CartController::class)->only(['store', 'update', 'destroy']);
})->middleware('auth:web');
