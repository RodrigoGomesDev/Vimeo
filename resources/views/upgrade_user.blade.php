{{-- @extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')]) --}}

@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@section('auth_header', __('Editar perfil'))
@section('auth_header', __('Informações de usuário'))


@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop










@section('auth_body')

<form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
    @csrf
    @method('put')



  <label class="col-form-label">{{ __('Nome') }}</label>

  <div class="input-group mb-3 {{ $errors->has('name') ? ' has-danger ' : '' }}">
      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true" autofocus>
      @if ($errors->has('name'))
      <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
      @endif

      <div class="input-group-append">
          <div class="input-group-text">
              <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
          </div>
      </div>  
  </div>
    <div class="input-group mb-3 {{ $errors->has('email') ? ' has-danger ' : '' }}">
      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
      @if ($errors->has('email'))
      <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
      @endif

      <div class="input-group-append">
          <div class="input-group-text">
              <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
          </div>
      </div>  
  </div>
  @if (session('status'))
  <div class="row">
    <div class="col-sm-12">
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">x</i>
        </button>
        <span>{{ ('Usuário editado com sucesso') }}</span>
      </div>
    </div>
  </div>
@endif


    <div class="row d-flex justify-content-between">
      <div class="col-4">
        <a href="http://teste.test/home" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}" style="color: white">
            <span class="fas fa-sign-in-alt"></span>
            {{ __('Voltar') }}
        </a>
    </div>
      <div class="col-4">
        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-sign-in-alt"></span>
            <a href="http://teste.test/home" style="color: white" >{{ __('Editar') }}</a>
        </button>
    </div>
    </div>

  </form> 
@endsection