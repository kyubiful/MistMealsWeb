@extends('web.layout.master-wo-menu')
@section('content')
  <x-web-black-friday-cybermonday-top-banner/>
  <x-web-black-friday-steps/>
    <x-web-black-friday-objetive :objetivo="$objetivo"/>
  <x-web-black-friday-bottom-banner/>
@endsection
