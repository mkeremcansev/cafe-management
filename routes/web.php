<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::name('auth.')->middleware('guest')->group(function (Router $router) {
    $router->get('/login', fn () => view('pages.auth.login'))->name('login');
    $router->get('/register', fn () => view('pages.auth.register'))->name('register');
    $router->post('/register', [RegisterController::class, 'register'])->name('register');
    $router->post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::name('dashboard.')->middleware('auth:web')->group(function (Router $router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->get('/reports', [ReportController::class, 'index'])->name('reports')->middleware('company.secure');
    $router->get('/cache/{company}', [HomeController::class, 'cache'])->name('cache');
    $router->post('/move-table/{table}', [TableController::class, 'move'])->name('move-table');
    $router->resource('/categories', CategoryController::class)->except(['show'])->middleware('company.secure');
    $router->resource('/products', ProductController::class)->except(['show'])->middleware('company.secure');
    $router->resource('/tables', TableController::class)->middleware('company.secure');
    $router->resource('/carts', CartController::class)->only(['store', 'update', 'destroy']);
    $router->resource('/collections', CollectionController::class)->only(['store']);
    $router->resource('/companies', CompanyController::class)->only(['edit', 'update'])->middleware('company.secure');
    $router->resource('/users', UserController::class)->except(['show', 'destroy'])->middleware('company.secure');
    $router->get('/logout', [LoginController::class, 'logout'])->name('logout');
});
