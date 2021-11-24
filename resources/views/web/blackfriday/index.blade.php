@extends('web.layout.master')
@section('content')
  <x-web-black-friday-top-banner/>
  <x-web-black-friday-steps/>
    <x-web-black-friday-objetive :objetivo="$objetivo"/>
  <x-web-black-friday-bottom-banner/>
@endsection
