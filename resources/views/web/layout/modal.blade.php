@if (!auth()->check())
    <div class="modal fade" role="dialog" tabindex="-1" id="login-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {!! Form::open(['method' => 'POST', 'route' => ['web.user.login'], 'id' => 'user-login'])!!}
                <div class="modal-header">
                    <h5 class="modal-title">Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p>Introduce los datos de inicio de sesión a continuación</p>
                    <div class="row">
                        <div class="col-6">
                            <div class="single_contact_form">
                                <input type="email" name="email" id="email" class="form-control cu_input" placeholder="Email" required/>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="single_contact_form">
                                <input type="password" name="password" id="password" class="form-control cu_input" placeholder="Contraseña" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p>¿No tienes cuenta de usuario? <a href="{{ route('web.user.signup') }}" class="base_color">Regístrate aquí</a></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="single_contact_form text-right">
                        <button type="submit" class="mist_btn animate_btn text-uppercase">Entrar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endif
