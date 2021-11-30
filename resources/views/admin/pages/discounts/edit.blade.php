@extends('admin.layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('admin.menu.platos')</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Descuentos</h6>
                <p class="card-description">Creador de cupones de descuento</p>
                <form action="{{route('admin.discount.update', $codigoDescuento->id)}}" method="post">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="" class="form-control" value="{{$codigoDescuento->name}}">
                        </div>
                        <div class="form-group col-2">
                            <label for="tipo">Tipo</label>
                            <select name="tipo" id="" class="form-control">
                                @if($codigoDescuento->tipo == 'porcentaje')
                                <option value="porcentaje" selected>Porcentaje</option>
                                @else
                                <option value="porcentaje">Porcentaje</option>
                                @endif
                                @if($codigoDescuento->tipo == 'free')
                                <option value="free" selected>Gratis</option>
                                @else
                                <option value="free">Gratis</option>
                                @endif
                                @if($codigoDescuento->tipo == 'fijo')
                                <option value="free" selected>Fijo</option>
                                @else
                                <option value="free">Fijo</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-1">
                            <label for="value">Cantidad</label>
                            <input type="number" name="value" id="" value="{{$codigoDescuento->value}}" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <label for="start">Inicio</label>
                            <input type="date" name="start" id="" value="{{date('Y-m-d', strtotime($codigoDescuento->start))}}" class="form-control">
                        </div>
                        <div class="form-group col-2">
                            <label for="end">Fin</label>
                            <input type="date" name="end" id="" value="{{date('Y-m-d', strtotime($codigoDescuento->end))}}" class="form-control">
                        </div>
                        <div class="form-check form-check-inline col-1" style="justify-content: center;">
                            @if($codigoDescuento->unique == 1)
                            <input type="checkbox" name="unique" id="" class="form-check-input" checked>
                            @else
                            <input type="checkbox" name="unique" id="" class="form-check-input">
                            @endif
                            <label for="unique" class="form-check-label" style="margin-left: 0px;">Único</label>
                        </div>
                        <div class="form-check form-check-inline col-1" style="justify-content: center;">
                            @if($codigoDescuento->active == 1)
                            <input type="checkbox" name="active" id="" class="form-check-input" checked>
                            @else
                            <input type="checkbox" name="active" id="" class="form-check-input">
                            @endif
                            <label for="active" class="form-check-label" style="margin-left: 0px;">Activo</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
