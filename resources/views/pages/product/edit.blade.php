@extends('layouts.default')
@section('title', __('words.menu.product.edit'))
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.product.edit')</h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-header border-bottom">
                    @lang('words.content.product_details')
                </div>
                <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.product.category')</label>
                                <select class="form-control select2-show-search form-select"
                                        data-placeholder="@lang('words.fields.product.category')" name="category_id">
                                    <option label="@lang('words.inputs.choose_one')"></option>
                                    @foreach($categories as $category)
                                        <option
                                            @selected($product->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.product.name')</label>
                                <input class="form-control" placeholder="@lang('words.fields.product.name')" type="text"
                                       name="name" required value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">@lang('words.fields.product.price')</label>
                                <input class="form-control money-input"
                                       placeholder="@lang('words.fields.product.price')" type="text" name="price"
                                       required value="{{ $product->price->getMinorAmount()->toInt() }}">
                            </div>
                            <button class="btn ripple btn-primary" type="submit">@lang('words.buttons.create')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
