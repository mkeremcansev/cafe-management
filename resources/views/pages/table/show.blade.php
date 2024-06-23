@extends('layouts.default')
@section('content')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">@lang('words.menu.table.show') <span
                    class="text-{{ get_table_status_colors($table->status) }}">({{ $table->name }})</span></h1>
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
                                        <form action="{{ route('dashboard.carts.update', $cartItem->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="type"
                                                   value="{{ \App\Enums\CartUpdateType::INCREMENT }}">
                                            <button class="btn btn-square btn-success-light me-1"><i
                                                    class="icon icon-plus"></i></button>
                                        </form>
                                        <form action="{{ route('dashboard.carts.update', $cartItem->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="type"
                                                   value="{{ \App\Enums\CartUpdateType::DECREMENT }}">
                                            <button class="btn btn-square btn-warning-light me-1"><i
                                                    class="icon icon-minus"></i></button>
                                        </form>
                                        <form action="{{ route('dashboard.carts.destroy', $cartItem->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger-light me-1"><i
                                                    class="icon icon-trash"></i></button>
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
                                                            <form action="{{ route('dashboard.carts.store') }}"
                                                                  method="POST">
                                                                @csrf
                                                                <input type="hidden" name="table_id"
                                                                       value="{{ $table->id }}">
                                                                <input type="hidden" name="product_id"
                                                                       value="{{ $product->id }}">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <button class="btn btn-square btn-success-light me-1"><i
                                                                        class="icon icon-plus"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- collapse -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
