<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Datatable extends Component
{
    public array $columns = [];

    public Collection $collection;

    public string $table;

    public string $routeNamePrefix;
    /**
     * Create a new component instance.
     */
    public function __construct(array $columns, Collection $collection, string $table, string $routeNamePrefix)
    {
        $this->columns = $columns;
        $this->collection = $collection;
        $this->table = $table;
        $this->routeNamePrefix = $routeNamePrefix;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable')
            ->withColumns($this->columns)
            ->withCollection($this->collection)
            ->withTable($this->table)
            ->withRouteNamePrefix($this->routeNamePrefix);
    }
}
