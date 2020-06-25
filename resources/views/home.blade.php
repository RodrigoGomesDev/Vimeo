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

                
                {{-- @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') --}}
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
    <div class="card card-outline card-primary col-md-3" style="margin: 10% auto 0">
        <div class="card-header ">
                <h3 class="card-title ml-5 mt-1 pl-5">
                    Editar perfil                    
                </h3>
                <span class="close" style="cursor: pointer">&times;</span>
            </div>


<div class="card-body register-card-body ">

        <form method="post" action="{{ route('profile.edit') }}" autocomplete="off" class="form-horizontal">
                @csrf
                @method('put')

            <label class="col-form-label">Nome</label>

            <div class="input-group mb-3 {{ $errors->has('name') ? ' has-danger ' : '' }}">
                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="Nome" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true" autofocus>
                @if ($errors->has('name'))
                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
            @endif
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user "></span>
                        {{ config('adminlte.classes_auth_icon', '') }}
                    </div>
                </div>
            </div>

            <label class="col-form-label">{{ __('Email') }}</label>
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
            <h3 class="card-title ml-5 mr-5 mt-2 pl-5">
                Alterar senha                   
            </h3>
            <span class="close2 ml-4" style="font-weight: 1000; font-size: 25px; color: #727272; cursor: pointer" id="close2">&times;</span>
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
    </div>
            <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Change password') }}</button>
            </div>
</form>
    </div>    
</div>

<script>
    // Get DOM Elements
    const modal = document.querySelector('#my-modal');
    const modal2 = document.querySelector('#my-modal2');
    const modalBtn = document.querySelector('#modal-btn');
    const modalBtn2 = document.querySelector('#modal-btn2');
    const closeBtn = document.querySelector('.close');
    const closeBtn2 = document.querySelector('.close2');

    // Events
    modalBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', outsideClick);
    modalBtn2.addEventListener('click', openModal2);
    closeBtn2.addEventListener('click', closeModal2);
    window2.addEventListener('click', outsideClick2);

    // Open
    function openModal() {
        modal.style.display = 'block';
    }

    function openModal2() {
        modal2.style.display = 'block';
    }

    // Close
    function closeModal() {
        modal.style.display = 'none';
    }
    function closeModal2() {
        modal2.style.display = 'none';
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

</script>

@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <iframe src="https://player.vimeo.com/video/359987235" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <iframe src="https://player.vimeo.com/video/361598693" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@stop
