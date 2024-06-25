@extends('layouts.default')
@push('scripts')
    <script src="{{ asset('assets/plugins/repeater/jquery.repeater.min.js') }}"></script>
    <script>
        let $repeater = $('.repeater').repeater({
            repeaters: [{
                selector: '.inner-repeater',
                repeaters: [{
                    selector: '.deep-inner-repeater'
                }]
            }]
        });
    </script>
@endpush
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.table.show')
                <span class="text-{{ get_table_status_colors($table->status) }}">({{ $table->name }})</span>
                @if($table->status->is(\App\Enums\TableStatus::OPEN))
                    <span>{{ $table->carts->moneySum('total_price') }}</span>
                @endif
            </h1>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row">
        <div class="col-xl-7 col-md-12">
            <div class="card cart">
                <div class="card-header border-bottom">
                    <h3 class="card-title">@lang('words.content.table_details')</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr class="border-top">
                                <th>@lang('words.fields.product.name')</th>
                                <th>@lang('words.fields.product.price')</th>
                                <th width="10">@lang('words.fields.cart.quantity')</th>
                                <th width="10">@lang('words.buttons.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($table->carts as $cartItem)
                                <tr>
                                    <td>{{ $cartItem->product->name }} ({{ $cartItem->price }})</td>
                                    <td>{{ $cartItem->total_price }}</td>
                                    <td class="text-center">{{ $cartItem->quantity }}</td>
                                    <td class="d-flex">
                                        <form action="{{ route('dashboard.carts.update', $cartItem->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="type" value="{{ \App\Enums\CartUpdateType::INCREMENT }}">
                                            <button class="btn btn-square btn-success-light me-1">
                                                <i class="icon icon-plus"></i>
                                            </button>
                                        </form>
                                        @if($table->has_collections === false)
                                            <form action="{{ route('dashboard.carts.update', $cartItem->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="type" value="{{ \App\Enums\CartUpdateType::DECREMENT }}">
                                                <button class="btn btn-square btn-warning-light me-1">
                                                    <i class="icon icon-minus"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('dashboard.carts.destroy', $cartItem->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-square btn-danger-light me-1">
                                                    <i class="icon icon-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-md-12">
            <div class="card cart">
                <div class="card-header border-bottom">
                    <h3 class="card-title">@lang('words.menu.category.index')</h3>
                </div>
                <div class="card-body">
                    <div aria-multiselectable="true" class="accordion-primary" role="tablist">
                        @foreach($categories as $category)
                            <div class="card mb-2">
                                <div class="card-header border-bottom-0" role="tab">
                                    <a class="accor-style2 collapsed" aria-expanded="false" data-bs-toggle="collapse"
                                       href="#category-collapse{{ $category->id }}">
                                        <i class="fe fe-plus-circle me-2"></i>
                                        <span>{{ $category->name }}</span>
                                    </a>
                                </div>
                                <div class="collapse" id="category-collapse{{ $category->id }}" role="tabpanel">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-vcenter text-nowrap mb-0">
                                                <thead>
                                                <tr class="border-top">
                                                    <th>@lang('words.fields.product.name')</th>
                                                    <th width="1">@lang('words.fields.product.price')</th>
                                                    <th width="1">@lang('words.buttons.actions')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($category->products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td class="d-flex justify-content-center">
                                                            <form action="{{ route('dashboard.carts.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="table_id" value="{{ $table->id }}">
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <button class="btn btn-square btn-success-light me-1">
                                                                    <i class="icon icon-plus"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($table->carts()->exists())
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-12 collection-bar">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success m-2 p-2">
                            @lang('words.fields.collection.paid_amount') {{ $table->total_collection }}
                        </div>
                        <div class="alert alert-danger m-2 p-2">
                            @lang('words.fields.collection.remaining_amount') {{ $table->carts->moneySum('total_price')->minus($table->total_collection) }}
                        </div>
                        <a href="#collection-modal" data-bs-effect="effect-scale" data-bs-toggle="modal"
                           class="btn btn-success m-0 my-1 mt-4">
                            <span>@lang('words.buttons.collection')</span>
                            <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="modal fade" id="collection-modal">
        <div class="modal-dialog modal-dialog-centered text-center modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">@lang('words.buttons.collection')</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="panel panel-primary">
                                <div class="tab-menu-heading border-bottom-0">
                                    <div class="tabs-menu ">
                                        <ul class="nav panel-tabs justify-content-center">
                                            <li>
                                                <a href="#manuel" id="manuel-tab" class="me-1 text-default my-1 active" data-bs-toggle="tab">@lang('words.content.manual_collection')</a>
                                            </li>
                                            <li>
                                                <a href="#product" id="product-tab" data-bs-toggle="tab" class="me-1 text-default my-1">@lang('words.content.product_collection')</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="manuel">
                                            <form action="{{ route('dashboard.collections.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="{{ \App\Enums\CollectionType::MANUEL }}">
                                                <input type="hidden" name="table_id" value="{{ $table->id }}">
                                                <div class="form-group">
                                                    <label
                                                        class="form-label">@lang('words.fields.collection.method')</label>
                                                    <select class="form-control select2-show-search form-select" data-placeholder="@lang('words.fields.collection.method')" name="method">
                                                        <option label="@lang('words.inputs.choose_one')"></option>
                                                        <option value="{{ \App\Enums\CollectionMethod::CASH }}">
                                                            @lang('words.fields.collection.methods.cash')
                                                        </option>
                                                        <option value="{{ \App\Enums\CollectionMethod::CREDIT_CARD }}">
                                                            @lang('words.fields.collection.methods.credit_card')
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">@lang('words.fields.collection.amount')</label>
                                                    <input class="form-control money-input" placeholder="@lang('words.fields.collection.amount')" type="text" name="amount" required>
                                                </div>
                                                <button class="btn btn-primary"
                                                        type="submit">@lang('words.buttons.collection')</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="product">
                                            <form action="{{ route('dashboard.collections.store') }}" method="POST">
                                                @csrf
                                                <div class="repeater">
                                                    <div class="form-group">
                                                        <label
                                                            class="form-label">@lang('words.fields.collection.method')</label>
                                                        <select class="form-control select2-show-search form-select"
                                                                data-placeholder="@lang('words.fields.collection.method')"
                                                                name="method">
                                                            <option label="@lang('words.inputs.choose_one')"></option>
                                                            <option value="{{ \App\Enums\CollectionMethod::CASH }}">
                                                                @lang('words.fields.collection.methods.cash')
                                                            </option>
                                                            <option value="{{ \App\Enums\CollectionMethod::CREDIT_CARD }}">
                                                                @lang('words.fields.collection.methods.credit_card')
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="type" value="{{ \App\Enums\CollectionType::PRODUCT_COLLECTION }}">
                                                    <input type="hidden" name="table_id" value="{{ $table->id }}">
                                                    <div data-repeater-list="products">
                                                        @foreach($table->carts as $cart)
                                                            <div data-repeater-item>
                                                                <div class="row d-flex align-items-end">
                                                                    <div class="col-md-5 col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="form-label">@lang('words.menu.product.product')</label>
                                                                            <select class="form-control form-select collection-select-disabled"
                                                                                    data-placeholder="@lang('words.menu.product.product')"
                                                                                    name="product_id">
                                                                                <option
                                                                                    label="@lang('words.inputs.choose_one')"></option>
                                                                                @foreach($table->carts as $cartProduct)
                                                                                    <option
                                                                                        @selected($cart->product_id === $cartProduct->product_id) value="{{ $cartProduct->product_id }}">{{ $cartProduct->product->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="form-label">@lang('words.fields.cart.quantity')</label>
                                                                            <input class="form-control"
                                                                                   placeholder="@lang('words.fields.cart.quantity')"
                                                                                   type="number" name="quantity"
                                                                                   required
                                                                                   value="{{ $cart->quantity }}"
                                                                                   id="quantity-{{ $cart->id }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="form-label">@lang('words.fields.collection.total_amount')</label>
                                                                            <span class="form-control span-price">{{ $cart->total_price }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-12">
                                                                        <div class="form-group">
                                                                            <button data-repeater-delete type="button" class="btn btn-danger waves-effect waves-float waves-light w-100">
                                                                                @lang('words.buttons.delete')
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button class="btn btn-primary" type="submit">@lang('words.buttons.collection')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">@lang('words.buttons.close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
