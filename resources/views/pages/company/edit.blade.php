@extends('layouts.default')
@section('title', __('words.menu.company.edit'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.company.edit')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @lang('words.content.company_details')
                </div>
                <form action="{{ route('dashboard.companies.update', $company->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.company.name')</label>
                                <input class="form-control" placeholder="@lang('words.fields.company.name')" type="text" name="name" required value="{{ $company->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.company.phone')</label>
                                <input class="form-control" placeholder="@lang('words.fields.company.phone')" type="text" name="phone" required value="{{ $company->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.company.email')</label>
                                <input class="form-control" placeholder="@lang('words.fields.company.email')" type="text" name="email" required value="{{ $company->email }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.company.address')</label>
                                <input class="form-control" placeholder="@lang('words.fields.company.address')" type="text" name="address" required value="{{ $company->address }}">
                            </div>
                            <button class="btn ripple btn-primary" type="submit">@lang('words.buttons.update')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
