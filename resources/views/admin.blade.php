<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}" style="position: fixed">
    
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif
    
    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
            data-widget="treeview" role="menu"
            @if(config('adminlte.sidebar_nav_animation_speed') != 300)
            data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
            @endif
            @if(!config('adminlte.sidebar_nav_accordion'))
            data-accordion="false"
            @endif>
            {{-- Configured sidebar links --}}
            <li class="nav-header">
                SUAS CONFIGURAÇÕES
            </li>
            
            <li class="nav-item" id="modal-btn">
                <a class="nav-link" style="cursor: pointer">
                    <i class="fas fa-fw fa-user "></i>
                    <p> Usuário </p>             
                </a>
            </li>
            
            <li class="nav-item" id="modal-btn2">
                <a class="nav-link" style="cursor: pointer">
                    <i class="fas fa-fw fa-lock "></i>
                    <p>Mude sua senha</p>
                </a>
            </li>
            
            <li class="nav-item" id="modal-btn3">
                <a class="nav-link" style="cursor: pointer">
                    <i class="fas fa-fw fa-envelope "></i>
                    <p>Adicionar usuário</p>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ url('users-list') }}" style="cursor: pointer">
                    <i class="fas fa-fw fa-list "></i>
                    <p>Lista de usuários</p>
                </a>
            </li> 
        </ul>
    </nav>
</div>

</aside>

@section('auth_header', __('Editar perfil'))
@section('auth_header', __('Informações de usuário'))

@section('adminlte_css_pre')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@stop


<div id="my-modal" class="modal">
    <div class="card card-outline card-primary col-md-3" style="margin: 8% auto 0">
        <div class="card-header mt-2" style="margin-left: 31%">
                <h5 class="card-title">
                    Editar perfil                    
                </h5>
                <span class="close" style="cursor: pointer">&times;</span>
            </div>


<div class="card-body register-card-body ">

        <form method="post" action="http://teste.test/profile/edit" autocomplete="off" class="form-horizontal">
                @csrf
                @method('put')

            <label class="col-form-label">Nome</label>

            <div class="input-group mb-3">
                <input class="form-control" name="name" id="input-name" type="text" placeholder="Nome" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user "></span>
                        {{ config('adminlte.classes_auth_icon', '') }}
                    </div>
                </div>
            </div>

            <label class="col-form-label">{{ __('Email') }}</label>
            <div class="input-group mb-3 ">
                <input class="form-control" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
               


                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div> 
            </div>

            <div class="col-12 p-0">
                <button type="submit" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('Editar') }}
                </button>
            </div>

            </form> 
        </div>
    </div>
</div>
<div id="my-modal2" class="modal2" style="display: none">
    <div class="card card-outline card-primary col-md-3" style="margin: 8% auto">
        <div class="card-header">
            <h5 class="card-title mt-2" style="margin-left: 31%">
                Alterar senha                   
            </h5>
            <span class="close2 ml-5" style="font-weight: 700; font-size: 25px; color: #727272; cursor: pointer; float: right" id="close2">&times;</span>
        </div>


    <div class="card-body register-card-body ">
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
            <div class="card-footer ml-auto mr-auto px-0">
                <button type="submit" class="btn btn-block btn-flat btn-primary">{{ __('Change password') }}</button>
            </div>
        </div>
        </form>
    </div>    
</div>

<div id="my-modal3" class="modal3" style="display: none">
@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

<div class="card card-outline card-primary col-md-3" style="margin: 8% auto">
    <div class="card-header">
        <h5 class="card-title mt-2" style="margin-left: 28%">
            Adicionar usuário                   
        </h5>
        <span class="close3 ml-5" style="font-weight: 700; font-size: 25px; color: #727272; cursor: pointer; float: right" id="close2">&times;</span>
    </div>
    <div class="card-body register-card-body ">
    <form action="" method="post">
        {{-- {{ $register_url }} --}}
        {{ csrf_field() }}

        {{-- Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('Nome completo') }}" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('Senha') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('Confirme a senha') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>
        <div class="input-group mb-3" >
            <select class="form-control text-muted" name="is_admin">
                <option value="" disabled selected >Categoria</option>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('Cadastrar') }}
        </button>

    </form>
</div>    
</div>

</div>

<script>
    // Get DOM Elements
    const modal = document.querySelector('#my-modal');
    const modalBtn = document.querySelector('#modal-btn');
    const closeBtn = document.querySelector('.close');
    
    const modal2 = document.querySelector('#my-modal2');
    const modalBtn2 = document.querySelector('#modal-btn2');
    const closeBtn2 = document.querySelector('.close2');

    const modal3 = document.querySelector('#my-modal3');
    const modalBtn3 = document.querySelector('#modal-btn3');
    const closeBtn3 = document.querySelector('.close3');

    // Events
    modalBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    // window.addEventListener('click', outsideClick);

    modalBtn2.addEventListener('click', openModal2);
    closeBtn2.addEventListener('click', closeModal2);
    // window2.addEventListener('click', outsideClick2);

    modalBtn3.addEventListener('click', openModal3);
    closeBtn3.addEventListener('click', closeModal3);
    // window3.addEventListener('click', outsideClick3);

    // Open
    function openModal() {
        modal.style.display = 'block';
    }

    function openModal2() {
        modal2.style.display = 'block';
    }

    function openModal3() {
        modal3.style.display = 'block';
    }

    // Close
    function closeModal() {
        modal.style.display = 'none';
    }
    function closeModal2() {
        modal2.style.display = 'none';
    }
    function closeModal3() {
        modal3.style.display = 'none';
    }

    // Close If Outside Click
    function outsideClick(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    }
    function outsideClick2(e) {
        if (e.target == modal2) {
            modal2.style.display = 'none';
        }
    }
    function outsideClick3(e) {
        if (e.target == modal3) {
            modal3.style.display = 'none';
        }
    }
</script>


@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">You are logged in! admin</p>
            </div>
        </div>
    </div>
</div>
@stop
