<section class="loginform subscribe_form_section login-form-container-ext2" style="display: flex; justify-content: center; align-items: center;">
    <div class="container">
        <div class="row justify-content-center align-items-center login-form-container">
            <div class="col-sm-6 wow fadeIn" style="z-index: 1;" data-wow-delay=".3s">
                <div class="section_tittle ">
                    <h2 class="d-inline-flex" style="color: #F9F2E1"><span>LOGIN</span></h2>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['web.user.loginCart'], 'id' => 'user-login'])!!}
                <div class="row">
                    <div class="col-12">
                        <div class="single_contact_form">
                            <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Dirección de correo" required />
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="single_contact_form">
                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control cu_input" placeholder="Contraseña" required />
                        </div>
                    </div>
                    <div class="col-12 text-right mt-3">
                        <a class="recoverpass" href="{{ route('password.request') }}">He olvidado mi contraseña</a>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="single_contact_form text-right login-btn">
                            <button type="submit" class="mist_btn animate_btn">Iniciar sesión</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                  <h2 class="mb-0" style="text-align: center; margin-top: 50px;">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span style="color: white; font-family: CoreSansC35 !important;">¿No tienes una cuenta?</span> <span style="font-family: CoreSansC35 !important;">Registrate</span>
                    </button>
                  </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="accordion" id="accordionExample">
  <div class="card" style="border-color: black;">
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body" style="padding: 0px; margin: 0px;">
        <x-web-user-signup/>
      </div>
    </div>
  </div>
</div>
