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

                <form action="{{route('admin.discount.store')}}" method="post">
                    @csrf
                    <div class="row">
                    <div class="form-group col-2">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="" class="form-control">
                    </div>
                    <div class="form-group col-2">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" id="" class="form-control">
                            <option value="porcentaje">Porcentaje</option>
                            <option value="free">Gratis</option>
                        </select>
                    </div>
                    <div class="form-group col-1">
                        <label for="value">Cantidad</label>
                        <input type="number" name="value" id="" class="form-control">
                    </div>
                    <div class="form-group col-2">
                        <label for="start">Inicio</label>
                        <input type="date" name="start" id="" class="form-control">
                    </div>
                    <div class="form-group col-2">
                        <label for="end">Fin</label>
                        <input type="date" name="end" id="" class="form-control">
                    </div>
                    <div class="form-check form-check-inline col-1" style="justify-content: center;">
                        <input type="checkbox" name="unique" id="" class="form-check-input">
                        <label for="unique" class="form-check-label" style="margin-left: 0px;">Único</label>
                    </div>
                    <div class="form-check form-check-inline col-1" style="justify-content: center;">
                        <input type="checkbox" name="active" id="" class="form-check-input">
                        <label for="active" class="form-check-label" style="margin-left: 0px;">Activo</label>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection