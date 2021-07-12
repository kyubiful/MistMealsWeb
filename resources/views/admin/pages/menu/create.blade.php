@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/menu">@lang('admin.menu.menus')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.create')</li>
        </ol>
    </nav>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.menu.store']])!!}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.menus'), trans('global.general.create')) }}</h6>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('nombre', trans('admin.page.menu.table.name')) !!}
                                {!! Form::input('text', 'nombre', old('nombre'), ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => trans('admin.page.menu.table.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('sexo_id', trans('admin.page.menu.table.sex')) !!}
                                {!! Form::select('sexo_id', $sexo->pluck('nombre', 'id'), old('sexo'), ['class' => 'form-control', 'id' => 'sexo_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('menu_peso_id', trans('admin.page.menu.table.weight')) !!}
                                {!! Form::select('menu_peso_id', $menu_peso->pluck('valor', 'id'), old('menu_peso'), ['class' => 'form-control', 'id' => 'menu_peso_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('admin.page.plato.add_dishe')</h6>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('plato_id'  , trans('admin.page.plato.dishe')) !!}
                                {!! Form::select('plato_id', $platos->pluck('nombre', 'id'), old('platos'), ['class' => 'form-control', 'id' => 'plato_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="button" class="btn btn-primary mr-2" id="btn-add-plato">@lang('global.general.add')</button>
                </div>
            </div>
        </div>

        <div class="col-md-9 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">@lang('admin.page.plato.title')</h6>
                    <p class="card-description">@lang('admin.page.plato.description')</p>

                    <div class="row wp-plato">

                        @include('template.plato')

                    </div><!-- Row -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
                    <a href="{{ route('admin.menu') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection

@push('custom-scripts')
    <script type="text/javascript">

        $('#btn-add-plato').on('click', function() {

            let $that = $(this);
            let buttonTextBefore = $that.text();

            $that.prop("disabled", true);
            $that.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...');

            $.ajax({
                url: '{{ route('admin.menu.template.plato') }}',
                cache: false,
                success: function (response) {
                    $(".wp-plato").append(response.html);

                    $that.prop("disabled", false);
                    $that.html(buttonTextBefore);
                }
            });

        });

    </script>
@endpush
