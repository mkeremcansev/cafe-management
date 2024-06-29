@extends('layouts.default')
@section('title', __('words.menu.category.index'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.category.index')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <x-datatable :route-name-prefix="'dashboard.categories'" :table="'category'" :columns="['name']"
                 :collection="$categories"/>
@endsection
