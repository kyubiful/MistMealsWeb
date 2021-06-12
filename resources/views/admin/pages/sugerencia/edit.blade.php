@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/sugerencia">@lang('admin.menu.suggestions')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.suggestions'), trans('global.general.edit')) }}</h6>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.suggestions.table.name')) !!}
                                {!! Form::input('text', 'nombre', $sugerencia->nombre, ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.name'), 'readonly']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('email', trans('admin.page.suggestions.table.email')) !!}
                                {!! Form::input('text', 'email', $sugerencia->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.email'), 'readonly']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('descripcion', trans('admin.page.suggestions.table.description')) !!}
                                {!! Form::textarea('descripcion', $sugerencia->descripcion, ['class' => 'form-control', '', 'id'=> 'descripcion', 'size' => '5x8', 'readonly']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['method' => 'PUT','route' => ['admin.sugerencia.update', $sugerencia->id]]) !!}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ trans('admin.page.suggestions.response') }}</h6>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                {!! Form::label('respuesta', trans('admin.page.suggestions.message')) !!}
                                {!! Form::textarea('respuesta', $sugerencia->respuesta, ['class' => 'form-control', '', 'id'=> 'tinymceExample', 'size' => '5x8']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.response')</button>
                    <a href="{{ route('admin.sugerencia') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
