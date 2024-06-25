<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Category;
use App\Models\Table;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TableController extends Controller
{
    public function __construct(public Table $table, public Category $category) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.table.index')->withTables($this->table->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request): RedirectResponse
    {
        $table = $this->table->create($request->validated());
        $table->states()->create();

        return back()->with('success', __('words.messages.success.table.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        $table->load('carts.product', 'openState.collections');

        return view('pages.table.show')
            ->withTable($table)
            ->withCategories($this->category->with('products')->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table): View
    {
        return view('pages.table.edit')->withTable($table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table): RedirectResponse
    {
        $table->update($request->validated());

        return back()->with('success', __('words.messages.success.table.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table): RedirectResponse
    {
        $table->delete();

        return back()->with('success', __('words.messages.success.table.deleted'));
    }
}
