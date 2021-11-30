@once
@push('custom-scripts')
  <script src="{{asset( 'js/web/home/web-home-plates-plate.js' )}}"></script>
@endpush

@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-best-plates.css')}}" />
@endpush
@endonce

<section>
  <h2 class="web-home-best-plate-title"> Nuestro platos TOP </h2>
  <div class="web-home-best-plate-container">
    <div class="web-home-best-plate-content">
      <div style="padding: 16px;">
        <x-global-plates-plate :plato="$platos[14]"/>
        <x-global-plates-plate class="hidden" style="margin-top: -519px;" :plato="$platos[15]"/>
      </div>
      <div style="padding: 16px;">
        <x-global-plates-plate :plato="$platos[20]"/>
        <x-global-plates-plate class="hidden" style="margin-top: -519px;" :plato="$platos[21]"/>
      </div>
      <div style="padding: 16px;">
        <x-global-plates-plate :plato="$platos[0]"/>
        <x-global-plates-plate class="hidden" style="margin-top: -519px;" :plato="$platos[1]"/>
      </div>
    </div>
  </div>
</section>
