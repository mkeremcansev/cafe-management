@push('scripts')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#responsive-datatable').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: '{{ __('words.inputs.search') }}',
                    sSearch: '',
                }
            });

            $('.delete-modal-open').on('click', function () {
                let id = $(this).attr('data-attr');
                $('.delete-modal-form').attr('action', '{{ route($routeNamePrefix.'.destroy', '') }}/' + id);
            });
        });
    </script>

@endpush
<div class="row">
    <div class="col-md-12 mb-3">
        <div class="btn-list">
            <a href="{{ route($routeNamePrefix.'.create') }}" class="btn btn-radius btn-primary">
                <i class="fa fa-plus"></i>
                <span>@lang('words.buttons.new_add')</span>
            </a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">@lang('words.menu.'.$table.'.index')</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                        <thead>
                        <tr>
                            @foreach($columns as $column)
                                <th class="wd-15p border-bottom-0">@lang('words.fields.'.$table.'.'.get_datatables_column_last_column($column))</th>
                            @endforeach
                            <th class="border-bottom-0" width="10">@lang('words.buttons.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collection as $builder)
                            <tr>
                                @foreach($columns as $column)
                                    <td>{{ get_datatables_column_relation($builder, split_datatables_column_relation(columnWithRelation: $column)) }}</td>
                                @endforeach
                                <td>
                                    <a href="{{ route($routeNamePrefix.'.edit', $builder->id) }}"
                                       class="btn btn-radius btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="modal-effect btn btn-radius btn-danger delete-modal-open"
                                       data-bs-effect="effect-scale" data-bs-toggle="modal" href="#delete-modal"
                                       data-attr="{{ $builder->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal fade" id="delete-modal">
                    <div class="modal-dialog modal-dialog-centered text-center" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">@lang('words.modal_titles.delete')</h6>
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                                        aria-hidden="true"><i class="fa fa-times"></i></span></button>
                            </div>
                            <div class="modal-body">
                                <h4 class="text-danger mb-20 mt-4 mb-4">@lang('words.modal_descriptions.delete')</h4>
                            </div>
                            <form class="delete-modal-form" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="submit">@lang('words.buttons.delete')</button>
                                    <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">@lang('words.buttons.close')</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
