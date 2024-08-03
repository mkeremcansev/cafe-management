@extends('layouts.default')
@section('title', __('words.menu.table.show'))
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
        <h1 class="page-title">
            <span class="text-{{ get_table_status_colors($table->status) }}">{{ $table->name }}</span>
        </h1>
    </div>
    <!-- PAGE-HEADER END -->
    @if($table->status->is(\App\Enums\TableStatus::OPEN))
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                            <span class="text-warning fs-16 d-block">
                                @lang('words.fields.collection.paid_amount') {{ $table->total_collection }}
                            </span>
                        <span class="text-danger fs-16 d-block">
                                @lang('words.fields.collection.remaining_amount') {{ $table->carts->moneySum('total_price')->minus($table->total_collection) }}
                            </span>
                        <a href="#table-history-modal" data-bs-effect="effect-scale" data-bs-toggle="modal"
                           class="btn btn-success m-0 my-1 mt-4">
                            <span>@lang('words.content.table_history')</span>
                            <i class="fa fa-search ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-7 col-md-12">
            <div class="card cart">
                <div class="card-header border-bottom">
                    <h3 class="card-title me-3">@lang('words.content.table_details')</h3>
                    @if($table->status->is(\App\Enums\TableStatus::OPEN))
                        <a href="#move-table-modal" data-bs-effect="effect-scale" data-bs-toggle="modal"
                           class="btn btn-success">
                            @lang('words.buttons.move')
                        </a>
                    @endif
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
                            @if($table->carts->count() > 0)
                                @foreach($table->carts as $cart)
                                    <tr>
                                        <td>{{ $cart->product->name }} ({{ $cart->price }})</td>
                                        <td>{{ $cart->total_price }}</td>
                                        <td class="text-center">{{ $cart->quantity }}</td>
                                        <td class="d-flex justify-content-center">

                                            @if($cart->is_before_collection === false)
                                                <form action="{{ route('dashboard.carts.update', $cart->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="type"
                                                           value="{{ \App\Enums\CartUpdateType::INCREMENT }}">
                                                    <button class="btn btn-square btn-success-light me-1">
                                                        <i class="icon icon-plus"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('dashboard.carts.update', $cart->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="type"
                                                           value="{{ \App\Enums\CartUpdateType::DECREMENT }}">
                                                    <button class="btn btn-square btn-warning-light me-1">
                                                        <i class="icon icon-minus"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('dashboard.carts.destroy', $cart->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-square btn-danger-light me-1">
                                                        <i class="icon icon-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">@lang('words.content.has_no_product')</td>
                                </tr>
                            @endif

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
                                                    <th width="1">@lang('words.fields.cart.quantity')</th>
                                                    <th width="1">@lang('words.buttons.actions')</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($category->products()->exists() > 0)
                                                    @foreach($category->products as $product)
                                                        <form action="{{ route('dashboard.carts.store') }}"
                                                              method="POST">
                                                            @csrf
                                                            <input type="hidden" name="table_id"
                                                                   value="{{ $table->id }}">
                                                            <input type="hidden" name="product_id"
                                                                   value="{{ $product->id }}">
                                                            <tr>
                                                                <td>{{ $product->name }}</td>
                                                                <td>{{ $product->price }}</td>
                                                                <td>
                                                                    <input class="form-control"
                                                                           placeholder="@lang('words.fields.collection.amount')"
                                                                           type="text" name="quantity" required
                                                                           value="1">
                                                                </td>
                                                                <td class="d-flex justify-content-center">
                                                                    <button
                                                                        class="btn btn-square btn-success-light me-1">
                                                                        <i class="icon icon-plus"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </form>

                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3"
                                                            class="text-center">@lang('words.content.has_no_product')</td>
                                                    </tr>
                                                @endif

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
    @if($table->carts->count() > 0)
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-12 collection-bar">
                <div aria-multiselectable="true" class="accordion-primary mb-2" id="accordion2" role="tablist">
                    <div class="card mb-0 mt-2">
                        <div class="card-header border-bottom-0" id="collection-information" role="tab">
                            <a class="accor-style2 collapsed" aria-controls="collection-information-collapse"
                               aria-expanded="false" data-bs-toggle="collapse" href="#collection-information-collapse">
                                <i class="fe fe-plus-circle me-2"></i>
                                <span>@lang('words.buttons.collection')</span>
                            </a>
                        </div>
                        <div aria-labelledby="collection-information" class="collapse"
                             data-bs-parent="#collection-information-collapse" id="collection-information-collapse"
                             role="tabpanel" style="">
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
                        </div><!-- collapse -->
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
                                                <a href="#manuel" id="manuel-tab" class="me-1 text-default my-1 active"
                                                   data-bs-toggle="tab">@lang('words.content.manual_collection')</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="manuel">
                                            <form action="{{ route('dashboard.collections.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type"
                                                       value="{{ \App\Enums\CollectionType::MANUEL }}">
                                                <input type="hidden" name="table_id" value="{{ $table->id }}">
                                                <div class="form-group">
                                                    <label
                                                        class="form-label">@lang('words.fields.collection.method')</label>
                                                    <select class="form-control select2-show-search form-select"
                                                            data-placeholder="@lang('words.fields.collection.method')"
                                                            name="method">
                                                        <option label="@lang('words.inputs.choose_one')"></option>
                                                        <option value="{{ \App\Enums\CollectionMethod::CASH }}"
                                                                selected>
                                                            @lang('words.fields.collection.methods.cash')
                                                        </option>
                                                        <option value="{{ \App\Enums\CollectionMethod::CREDIT_CARD }}">
                                                            @lang('words.fields.collection.methods.credit_card')
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        class="form-label">@lang('words.fields.collection.amount')</label>
                                                    <input class="form-control money-input"
                                                           placeholder="@lang('words.fields.collection.amount')"
                                                           type="text" name="amount" required
                                                           value="{{ $table->carts->moneySum('total_price')->minus($table->total_collection)->getMinorAmount()->toInt() }}">
                                                </div>
                                                <button class="btn btn-primary"
                                                        type="submit">@lang('words.buttons.collection')</button>
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
    <div class="modal fade" id="move-table-modal">
        <div class="modal-dialog modal-dialog-centered text-center modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">@lang('words.buttons.move')</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('dashboard.move-table', $table->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label
                                        class="form-label">@lang('words.menu.table.table')</label>
                                    <select class="form-control select2-show-search form-select"
                                            data-placeholder="@lang('words.menu.table.table')" name="table_id">
                                        <option label="@lang('words.inputs.choose_one')"></option>
                                        @foreach($tablesWithoutCurrent as $tableWithoutCurrent)
                                            <option value="{{ $tableWithoutCurrent->id }}">
                                                {{ $tableWithoutCurrent->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-primary"
                                        type="submit">@lang('words.buttons.move')</button>
                            </form>
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
    <div class="modal fade" id="table-history-modal">
        <div class="modal-dialog modal-dialog-centered text-center modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">@lang('words.content.table_history')</h6>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <ul>
                                @foreach($table->carts as $cart)
                                    <li class="list-style-1">
                                        @lang('words.messages.general.created_by_user', [
                                            'name' => $cart->user->name,
                                            'quantity' => $cart->quantity,
                                            'product' => $cart->product->name,
                                        ])
                                    </li>
                                @endforeach
                            </ul>
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
