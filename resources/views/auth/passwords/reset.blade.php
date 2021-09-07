@extends('web.layout.master')

@section('content')
<div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper auth-form-light">
            <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5 new-password-container">
                    <h4> Contraseña nueva </h4>
                    <h6 class="font-weight-light">
                        Por favor, introduzca una nueva contraseña 
                    </h6>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Correo electrónico no válido</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password"
                                    placeholder="nueva contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>La contraseña no coincide</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirme nueva contraseña">
                            </div>
                            <div class="form-group mb-0">

                                <button type="submit"
                                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn new-password-btn">
                                    Restablecer contraseña
                                </button>

                                <div class="text-center mt-4 font-weight-light">
                                        ¿Tienes cuenta? <a href="{{ route('login') }}"
                                            class="new-password-link">Inicia sesión</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.layout.newsletter')
@endsection
