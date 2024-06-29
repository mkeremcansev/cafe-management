@extends('layouts.default')
@section('title', __('words.menu.category.edit'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.category.edit')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @lang('words.content.category_details')
                </div>
                <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.category.name')</label>
                                <input class="form-control" placeholder="@lang('words.fields.category.name')" type="text" name="name" required value="{{ $category->name }}">
                            </div>
                            <button class="btn ripple btn-primary" type="submit">@lang('words.buttons.update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
