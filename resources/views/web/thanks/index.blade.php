@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/web/thanks/web-thanks-you-page.css')}}" />
@endpush
@endonce
@extends('web.layout.master')
@section('content')
  <p>Hola Mundo</p>
  <x-global-newsletter/>
@endsection
