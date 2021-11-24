@extends('web.layout.master')
@section('content')
  <x-web-black-friday-top-banner/>
  <x-web-home-best-plates :platos="$platos"/>
  <div style="margin-bottom: 40px; display: flex; justify-content: center">
    <x-global-primary-button type="link" url="platos" name="Ver más"/>
  </div>
  <x-web-black-friday-bottom-banner/>
@endsection
