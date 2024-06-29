@extends('layouts.default')
@section('title', __('words.menu.user.index'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.user.index')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <x-datatable :route-name-prefix="'dashboard.users'" :table="'user'" :columns="['name']"
                 :collection="$users"/>
@endsection
