<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(public Table $table) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.home')->withTables($this->table->hasCloseOrOpenState()->get());
    }
}
