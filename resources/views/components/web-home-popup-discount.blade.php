@once
@push('css')
  <link rel="stylesheet" href="{{asset('/css/home/web-home-popup-discount.css')}}" />
@endpush
@endonce

<section class="home-popup-container">
  <div class="home-popup-content">
    <button class="home-popup-btn" style="margin-bottom: -10px;">X</button>
    <h2>¡BIENVENID@S!</h2>
    <p style="width: 80%; text-align: center; margin: auto; line-height: 1.5;">Suscribete a nuestra Newsletter y consigue un 10% de descuento en tu primer pedido</p>
    <form action="{{route('web.mailchimp.store')}}" method="post" class="web-home-popup-discount-form">
      @csrf
      <input type="email" class="form-control cu_input" name="email" id="mce-EMAIL" placeholder="Déjanos tu email" required>
      <button type="submit" class="cu_btn animate_btn text-white" style="background-color: #FF810C;">Suscríbete</button>
    </form>
  </div>
</section>
