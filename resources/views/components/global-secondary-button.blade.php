@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/global/global-secondary-button.css')}}" />
@endpush
@endonce

<a href="{{route($url)}}">
  <div class="global-secondary-btn">
    {{$name}}
  </div>
</a>
