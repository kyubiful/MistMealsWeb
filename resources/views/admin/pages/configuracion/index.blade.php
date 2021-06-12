@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/configuracion">@lang('admin.menu.config')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                {!! Form::close() !!}
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.config'), trans('global.general.edit')) }}</h6>
                    {!! Form::open(['method' => 'PUT','route' => ['admin.config.update']])!!}
                    @foreach($config as $i => $el)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::label($el->clave, ucfirst($el->clave)) !!}
                                    {!! Form::input('text', 'valor[]', $el->valor, ['class' => 'form-control', 'placeholder' => lcfirst($el->clave), 'required']) !!}
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                    @endforeach

                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
                </div>
            </div>
        </div>
    </div>
@endsection
