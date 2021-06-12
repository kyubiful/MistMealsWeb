@extends('admin.layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">@lang('admin.menu.dashboard')</a></li>
    <li class="breadcrumb-item"><a href="/admin/plato">@lang('admin.menu.platos')</a></li>
    <li class="breadcrumb-item active" aria-current="page">@lang('global.general.edit')</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-12">
    <h6 class="card-title">{{ sprintf('%s - %s', trans('admin.menu.platos'), trans('global.general.edit')) }}</h6>
    {!! Form::open(['method' => 'PUT','route' => ['admin.plato.update', $plato->id], 'files' => true])!!}
    <div class="row">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">@lang('admin.page.plato.photo')</h6>
            <p class="card-description">Foto 1</p>
            <img src="{{ $plato->getUrlImage1Attribute() }}" class="card-img-top" alt="img 1 {{ $plato->nombre }}">
            <input type="file" name="photo1" class="myDropify border" />
            <p class="card-description mt-3">Foto 2</p>
            <img src="{{ $plato->getUrlImage2Attribute() }}" class="card-img-top" alt="img 2 {{ $plato->nombre }}">
            <input type="file" name="photo2" class="myDropify border" />
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">@lang('admin.page.plato.info_nutritional.title')</h6>
            <p class="card-description">@lang('admin.page.plato.info_nutritional.info_nutri_desc')</p>
            <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                        </th>
                        <th>
                          @lang('admin.page.plato.per_100')
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.energy')
                        </td>
                        <td>
                          {!! Form::number('energia', round($plato->plato_info_nutricional->energia, 1), ['id' => 'energia', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.energy'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.calories')
                        </td>
                        <td>
                          {!! Form::number('info_nutri_calorias', round($plato->plato_info_nutricional->calorias, 1), ['id' => 'info_nutri_calorias', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.calories'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.protein')
                        </td>
                        <td>
                          {!! Form::number('proteinas', round($plato->plato_info_nutricional->proteinas, 1), ['id' => 'proteinas', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.protein'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.fats')
                        </td>
                        <td>
                          {!! Form::number('grasas', round($plato->plato_info_nutricional->grasas, 1), ['id' => 'grasas', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.fats'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.satured')
                        </td>
                        <td>
                          {!! Form::number('saturadas', round($plato->plato_info_nutricional->saturadas, 1), ['id' => 'saturadas', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.satured'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.carbo')
                        </td>
                        <td>
                          {!! Form::number('carbohidratos', round($plato->plato_info_nutricional->carbohidratos, 1), ['id' => 'carbohidratos', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.carbo'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.sugars')
                        </td>
                        <td>
                          {!! Form::number('azucar', round($plato->plato_info_nutricional->azucar, 1), ['id' => 'azucar', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.sugars'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.fibre')
                        </td>
                        <td>
                          {!! Form::number('fibra', round($plato->plato_info_nutricional->fibra, 1), ['id' => 'fibra', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.fibre'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          @lang('admin.page.plato.info_nutritional.sodium')
                        </td>
                        <td>
                          {!! Form::number('sodio', round($plato->plato_info_nutricional->sodio, 1), ['id' => 'sodio', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.info_nutritional.sodium'), 'min' => 0, 'step' => '0.1', 'required']) !!}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div><!-- Col -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">@lang('admin.page.plato.dishe')</h6>
            <p class="card-description">@lang('admin.page.plato.dishe_desc')</p>
            <div class="row form-group">
              <div class="col-sm-2">
                <div class="form-group">
                  <label for="codigo">Código</label>
                  <select name="codigo" id="">
                    <option {{$cod == 'CA' ? 'selected' : ''}} value="CA">CA</option>
                    <option {{$cod == 'AV' ? 'selected' : ''}} value="AV">AV</option>
                    <option {{$cod == 'PE' ? 'selected' : ''}} value="PE">PE</option>
                    <option {{$cod == 'VE' ? 'selected' : ''}} value="VE">VE</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-2" style="display: flex; align-items: flex-end;">
                <div class="form-group">
                  <!-- {!! Form::label('plato_codigo_id', trans('admin.page.plato.table.code')) !!} -->
                  {!! Form::select('plato_codigo_id', $platos_codigos->pluck('codigo', 'id'), $plato->plato_codigo_id, ['class' => 'form-control', 'id' => 'plato_codigo_id', 'required']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-5">
                <div class="form-group">
                  {!! Form::label('nombre', trans('admin.page.plato.table.name')) !!}
                  {!! Form::input('text', 'nombre', $plato->nombre, ['id' => 'nombre', 'class' => 'form-control', 'placeholder' => trans('admin.page.menu.table.name'), 'required']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-3">
                <div class="form-group">
                  {!! Form::label('calorias', trans('admin.page.plato.table.calories')) !!}
                  {!! Form::number('calorias', round($plato->calorias, 1), ['id' => 'calorias', 'class' => 'form-control', 'placeholder' => trans('admin.page.plato.table.calories'), 'min' => 0, 'step' => '0.01', 'required']) !!}
                </div>
              </div><!-- Col -->
            </div>
            <div class="row form-group">
              <div class="col-sm-4">
                <div class="form-group">
                  {!! Form::label('plato_peso_id', trans('admin.page.plato.table.weight')) !!}
                  {!! Form::select('plato_peso_id', $platos_pesos->pluck('valor', 'id'), $plato->plato_peso_id, ['class' => 'form-control', 'id' => 'plato_peso_id', 'required']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  {!! Form::label('precio', trans('admin.page.plato.table.price')) !!}
                  {!! Form::number('precio', $plato->precio, ['id' => 'precio', 'class' => 'form-control', 'placeholder' => trans('admin.page.menu.table.price'), 'min' => 0, 'step' => '0.01', 'required']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  {!! Form::label('base_proteina_id', trans('admin.page.plato.table.protein')) !!}
                  {!! Form::select('base_proteina_id', $bases_proteina->pluck('nombre', 'id'), $plato->base_proteina_id, ['class' => 'form-control', 'id' => 'base_proteina_id', 'required']) !!}
                </div>
              </div><!-- Col -->
            </div>
            <div class="row form-group">
              <div class="col-sm-12">
                <div class="form-group">
                  {!! Form::label('ingredientes', trans('admin.page.plato.table.ingredients')) !!}
                  {!! Form::textarea('ingredientes', $plato->ingredientes, ['class' => 'form-control', '', 'id'=> 'ingredientes', 'size' => '5x5']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="receta">Receta</label>
                  {!! Form::textarea('receta', $plato->receta, ['class' => 'form-control', '', 'id'=> 'receta', 'size' => '5x5']) !!}
                </div>
              </div><!-- Col -->
            </div>
            <div class="row form-group">
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::label('alergenos', trans('admin.page.plato.table.allergens')) !!}
                  {!! Form::select('alergenos[]', $alergenos->pluck('nombre', 'id'), $plato->plato_alergeno->pluck('id'), ['class' => 'form-control', 'id' => 'alergenos', 'multiple']) !!}
                </div>
              </div><!-- Col -->
              <div class="col-sm-6">
                <div class="form-group">
                  {!! Form::label('etiquetas', trans('admin.page.plato.table.tags')) !!}
                  {!! Form::select('etiquetas[]', $etiquetas->pluck('nombre', 'id'), $plato->plato_etiqueta->pluck('id'), ['class' => 'form-control', 'id' => 'etiquetas', 'multiple']) !!}
                </div>
              </div><!-- Col -->
            </div>
            <button type="submit" class="btn btn-primary mr-2">@lang('global.general.save')</button>
            <a href="{{ route('admin.plato') }}" class="btn btn-light">@lang('global.general.cancel')</a>
          </div>
        </div>
      </div>
    </div><!-- Row -->
    {!! Form::close() !!}
  </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush