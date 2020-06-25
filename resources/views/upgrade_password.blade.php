{{-- @extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')]) --}}


@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@section('auth_header', __('Editar perfil'))
@section('auth_header', __('Informações de usuário'))


@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop

@section('auth_body')
            <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
                @csrf
                @method('put')


                    <label class="col-form-label">Senha atual</label>
                        
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Senha atual') }}" value="" required />
                        @if ($errors->has('old_password'))
                            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                        @endif
                        </div>


            <label class="col-form-label">Senha nova</label>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('Senha nova') }}" value="" required />
                        @if ($errors->has('password'))
                            <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                        @endif
                        </div>

                        <label class="col-form-label">Confime nova senha</label>


                        <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirme nova senha') }}" value="" required />
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
                </div>
                </div>
            </form>
            </div>
        </div>
    </div>
  </div>
@endsection