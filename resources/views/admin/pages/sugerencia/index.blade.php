@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('admin.menu.suggestions')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('admin.page.suggestions.title')</h6>
                    <p class="card-description">@lang('admin.page.suggestions.description')</p>
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                            <thead>
                            <tr>
                                <th>@lang('admin.page.suggestions.table.name')</th>
                                <th>@lang('admin.page.suggestions.table.email')</th>
                                <th>@lang('admin.page.suggestions.table.description')</th>
                                <th>@lang('admin.page.suggestions.table.revised')</th>
                                <th></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>

    <script>
        $(function () {
            $('#dataTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: '{{ route('admin.sugerencia.data') }}',
                order: [],
                oLanguage: {
                    "sProcessing": '@lang('global.general.processing')'
                },
                columns: [
                    {data: 'nombre'},
                    {data: 'email'},
                    {data: 'descripcion'},
                    {data: 'revisado'},
                    {data: 'action', orderable: false, searchable: false}
                ],
                initComplete: function(settings, json) {
                    feather.replace();
                }
            });
        });
    </script>
@endpush
