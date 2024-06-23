@extends('layouts.default')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.table.index')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <x-datatable :route-name-prefix="'dashboard.tables'" :table="'table'" :columns="['name']"
                 :collection="$tables"/>
@endsection
