@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/global/global-primary-button.css')}}" />
@endpush
@endonce

@if($type=='link')

<a href="{{$url}}">
  <div class="global-primary-btn">
    {{$name}}
  </div>
</a>

@elseif($type=='button')

<button class="global-primary-btn-container {{$class}}" type="submit">
  <div class="global-primary-btn">
    {{$name}}
  </div>
</button>

@endif
