<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(public Product $product, public Category $category) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.product.index')->withProducts($this->product->with('category')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.product.create')->withCategories($this->category->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $this->product->create($request->validated());

        return back()->with('success', __('words.messages.success.product.created'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        return view('pages.product.edit')->withProduct($product)->withCategories($this->category->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());

        return back()->with('success', __('words.messages.success.product.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return back()->with('success', __('words.messages.success.product.deleted'));
    }
}
