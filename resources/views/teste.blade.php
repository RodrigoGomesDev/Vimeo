{{-- @extends('adminlte::page') --}}

{{-- @section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('title', 'Dashboard')

@section('content_header')
<h1>Usuários</h1>
@stop --}}

{{-- @section('content') --}}
{{-- <div class="row">
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
                        @foreach ($users->all() as $user)
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
</div>   --}}
    
  <!-- Modal -->
  {{-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <form action="{{route('teste.update', 'test')}}" method="post">
          {{method_field('patch')}}
          {{csrf_field()}}
        <div class="modal-body">
            <input type="hidden" name="users_id" id="user_id" value="">
            <div class="form-group">
              <label for="name">name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
            
            <div class="form-group">
              <label for="email">email</label>
              <textarea name="email" id="email" id='email' class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
  </div>

  <script src="{{('js/app.js')}}"></script>


<script>
    $('#edit').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
      var name = button.data('myname') 
      var email = button.data('myemail') 
      var user_id = button.data('userid') 
      var modal = $(this)
    
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
      modal.find('.modal-body #user_id').val(user_id);
    })
    
    
</script>  --}}

{{-- @stop --}}

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<div class="">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">All users</h3>
    </div>

    <div class="box-body">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Modify</th>
          </tr>
          
        </thead>

        <tbody>

          @foreach($users->all() as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->description}}</td>
              <td>
                <button class="btn btn-info" data-myname="{{$user->name}}" data-myemail="{{$user->email}}" data-userid={{$user->id}} data-toggle="modal" data-target="#edit">Edit</button>
              </td>
            </tr>

          @endforeach
        </tbody>


      </table>				
    </div>
  </div>
</div>



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
    </div>
    <form action="{{route('teste.update', 'test')}}" method="post">
        {{method_field('patch')}}
        {{csrf_field()}}
      <div class="modal-body">
          <input type="hidden" name="users_id" id="user_id" value="">
          <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" name="name" id="name">
          </div>
          
          <div class="form-group">
            <label for="email">email</label>
            <textarea name="email" id="email" id='email' class="form-control"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </div>
</div>
</div>

<script src="{{('js/app.js')}}"></script>

<script>


$('#edit').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget) 
  var name = button.data('myname') 
  var email = button.data('myemail') 
  var user_id = button.data('userid') 
  var modal = $(this)

  modal.find('.modal-body #name').val(name);
  modal.find('.modal-body #email').val(email);
  modal.find('.modal-body #user_id').val(user_id);
})


</script>