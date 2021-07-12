@extends('admin.layout.master')

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
            <li class="breadcrumb-item"><a href="/admin/menu">@lang('admin.menu.menus')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.menus'), trans('global.general.edit')) }}</h6>
                    {!! Form::open(['method' => 'PUT','route' => ['admin.menu.update', $menu->id]])!!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('nombre', trans('admin.page.menu.table.name')) !!}
                                {!! Form::input('text', 'nombre', $menu->nombre, ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => trans('admin.page.menu.table.name'), 'required']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('sexo_id', trans('admin.page.menu.table.sex')) !!}
                                {!! Form::select('sexo_id', $sexo->pluck('nombre', 'id'), $menu->sexo_id, ['class' => 'form-control', 'id' => 'sexo_id']) !!}
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('menu_peso_id', trans('admin.page.menu.table.weight')) !!}
                                {!! Form::select('menu_peso_id', $menu_peso->pluck('valor', 'id'), $menu->menu_peso_id, ['class' => 'form-control', 'id' => 'menu_peso_id']) !!}
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    <button type="submit" class="btn btn-primary mr-2">@lang('global.general.update')</button>
                    <a href="{{ route('admin.menu') }}" class="btn btn-light">@lang('global.general.cancel')</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
