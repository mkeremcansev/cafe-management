<?php

namespace App\Http\Controllers;

use App\Enums\TableStatus;
use App\Http\Requests\MoveTableRequest;
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
        $table->load('carts.product', 'carts.user', 'openState.collections');

        $tablesWithoutCurrent = $this->table->where('id', '!=', $table->id)->get();

        return view('pages.table.show')
            ->withTable($table)
            ->withTablesWithoutCurrent($tablesWithoutCurrent)
            ->withCategories($this->category->with('products')->whereHas('products')->get());
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

    public function move(MoveTableRequest $request, Table $table): RedirectResponse
    {
        $tableState = $table->openState()->first();

        $selectedTable = $this->table->findOrFail($request->table_id);

        $selectedTableState = $selectedTable->closeOrOpenStates()->first();

        if ($selectedTableState->status->isNot(TableStatus::OPEN)) {
            $selectedTableState->update([
                'status' => TableStatus::OPEN,
            ]);
        }

        $table->carts()->update([
            'carts.table_state_id' => $selectedTableState->id,
        ]);

        $tableState?->collections()->update([
            'table_state_id' => $selectedTableState->id,
        ]);

        $tableState?->update([
            'status' => TableStatus::MOVED,
        ]);

        $table->closeState()->create();

        return redirect()->route('dashboard.tables.show', $selectedTable->id)->with('success', 'Table moved successfully.');
    }
}
