@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/user">@lang('admin.menu.users')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.create')</li>
        </ol>
    </nav>

    {!! Form::open(['method' => 'POST', 'route' => ['admin.user.store']])!!}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.users'), trans('global.general.create')) }}</h6>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('name', trans('admin.page.user.table.name')) !!}
                                {!! Form::input('text', 'name', old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('surname', trans('admin.page.user.table.surname')) !!}
                                {!! Form::input('text', 'surname', old('surname'), ['id' => 'surname', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.surname'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('email', trans('admin.page.user.table.email')) !!}
                                {!! Form::input('text', 'email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.email'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('password', trans('admin.page.user.table.password')) !!}
                                {!! Form::input('password', 'password', old('password'), ['id' => 'password', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.password'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('profesion_id', trans('admin.page.user.table.profession')) !!}
                                {!! Form::select('profesion_id', $profesion->pluck('nombre', 'id'), old('profesion_id'), ['class' => 'form-control', 'id' => 'profesion_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('peso', trans('admin.page.user.table.weight')) !!}
                                {!! Form::number('peso', old('peso'), ['id' => 'peso', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.weight'), 'required', 'min' => 40, 'max' => 120, 'step' => '0.01']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('altura', trans('admin.page.user.table.height')) !!}
                                {!! Form::number('altura', old('altura'), ['id' => 'altura', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.height'), 'required', 'min' => 140, 'max' => 210, 'step' => '1']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('edad', trans('admin.page.user.table.years')) !!}
                                {!! Form::number('edad', old('edad'), ['id' => 'edad', 'class' => 'form-control', 'placeholder' => trans('admin.page.user.table.years'), 'required', 'min' => 18, 'max' => 80, 'step' => '1']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                {!! Form::label('sexo_id', trans('admin.page.user.table.sex')) !!}
                                {!! Form::select('sexo_id', $sexo->pluck('nombre', 'id'), old('sexo_id'), ['class' => 'form-control', 'id' => 'sexo_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('estado_civil_id', trans('admin.page.user.table.civilstate')) !!}
                                {!! Form::select('estado_civil_id', $estadocivil->pluck('nombre', 'id'), old('estado_civil_id'), ['class' => 'form-control', 'id' => 'estado_civil_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!! Form::label('estado_laboral_id', trans('admin.page.user.table.laboralstate')) !!}
                                {!! Form::select('estado_laboral_id', $estadolaboral->pluck('nombre', 'id'), old('estado_laboral_id'), ['class' => 'form-control', 'id' => 'estado_laboral_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-2">
                            <div class="form-group">
                                {!! Form::label('nivel_ejercicio_id', trans('admin.page.user.table.exercice')) !!}
                                {!! Form::select('nivel_ejercicio_id', $ejercicio->pluck('nombre', 'id'), old('nivel_ejercicio_id'), ['class' => 'form-control', 'id' => 'nivel_ejercicio_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-2">
                            <div class="form-group">
                                {!! Form::label('objetivo_id', trans('admin.page.user.table.objective')) !!}
                                {!! Form::select('objetivo_id', $objetivo->pluck('nombre', 'id'), old('objetivo_id'), ['class' => 'form-control', 'id' => 'objetivo_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->
                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
                    <a href="{{ route('admin.user') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection
