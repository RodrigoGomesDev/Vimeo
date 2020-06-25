<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
    .modal-backdrop {
    /* bug fix - no overlay */    
    display: none;    
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center
}

.pagination .active{
    background-color: red;
}
</style>

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

@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('title', 'Dashboard')

@section('content_header')
<h1>Usuários</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table" style="padding: 0" id="myTable"  cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Email</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                
                      <tbody class="">
                        @foreach ($users as $user)
                            <tr class="data-row">
                                <td style="padding: 25 10 0">{{ $user->id }}</td>  
                                <td style="padding: 25 10 0">{{ $user->name }}</td>
                                <td style="padding: 25 10 0">{{ $user->email }}</td>
                                
                                <td style="padding: 25 10 0">
                                    <div class="d-flex row">
                                    <form action="{{ route('users-list.delete', $user->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        
                                        <button type="submit" onclick="return confirm('Tem certeza que quer deletar este usuário?');" class="btn btn-danger btn-sm">Delete</button> 
                                    </form>

                                    <button class="btn btn-info btn-sm h-25" data-myname="{{$user->name}}" data-myemail="{{$user->email}}" data-userid={{$user->id}} data-toggle="modal" data-target="#edit">Editar</button>
                                    </div>
                                </td>   
                            </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
@if (isset($filters))
{!! $users->appends($filters)->links() !!}
@else
{!! $users->links() !!}
@endif

  <!-- Modal -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content card card-outline card-primary" style="margin: 25% auto">
        <div class="modal-header card-header">
            <h5 class="card-title mt-2" style="margin-left: 31%" id="myModalLabel">
                Editar usuário                  
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top: 8px; border: 0"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{route('users-list.update', 'test')}}" method="post">
            {{method_field('patch')}}
            {{csrf_field()}}
          <div class="modal-body">
              <input type="hidden" name="users_id" id="user_id" value="">
              <label>Nome</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="name" id="name">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
              </div>
              
              <label>Email</label>
              <div class="input-group">
                <input name="email" id="email" id='email' class="form-control">
              
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
    </div>
@stop



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script>
    // Seu usuário
    const modal = document.querySelector('#my-modal');
    const modalBtn = document.querySelector('#modal-btn');
    const closeBtn = document.querySelector('.close');
    
    // Modal mudar senha
    const modal2 = document.querySelector('#my-modal2');
    const modalBtn2 = document.querySelector('#modal-btn2');
    const closeBtn2 = document.querySelector('.close2');


    // Eventos
    modalBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);

    modalBtn2.addEventListener('click', openModal2);
    closeBtn2.addEventListener('click', closeModal2);

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

</script>

<script src="{{('js/app.js')}}"></script>