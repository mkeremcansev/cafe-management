<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(public Category $category)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.category.index')->withCategories($this->category->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->category->create($request->validated());

        return back()->with('success', __('words.messages.success.category.created'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.category.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return back()->with('success', __('words.messages.success.category.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', __('words.messages.success.category.deleted'));
    }
}
