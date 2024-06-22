@extends('layouts.default')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.product.index')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <x-datatable :route-name-prefix="'dashboard.products'" :table="'product'" :columns="['name', 'price', 'category.name']"
                 :collection="$products"/>
@endsection
