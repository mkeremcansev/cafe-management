@extends('layouts.default')
@section('title', __('words.menu.table.edit'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.table.edit')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @lang('words.content.table_details')
                </div>
                <form action="{{ route('dashboard.tables.update', $table->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.table.name')</label>
                                <input class="form-control" placeholder="@lang('words.fields.table.name')" type="text" name="name" required value="{{ $table->name }}">
                            </div>
                            <button class="btn ripple btn-primary" type="submit">@lang('words.buttons.update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
