@extends('layouts.default')
@section('title', __('words.menu.user.edit'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.user.edit')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @lang('words.content.user_details')
                </div>
                <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.user.name')</label>
                                <input class="form-control" placeholder="@lang('words.fields.user.name')" type="text" name="name" required value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.user.email')</label>
                                <input class="form-control" placeholder="@lang('words.fields.user.email')" type="text" name="email" required value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.user.password')</label>
                                <input class="form-control" placeholder="@lang('words.fields.user.password')" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.user.password_confirmation')</label>
                                <input class="form-control" placeholder="@lang('words.fields.user.password_confirmation')" type="password" name="password_confirmation">
                            </div>
                            <button class="btn ripple btn-primary" type="submit">@lang('words.buttons.create')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
