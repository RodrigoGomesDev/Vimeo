<form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ old('name') }}">
        </div class="form-group">
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email:" name="email" value="{{ old('email')}}" >
        </div class="form-group">
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Senha:" value="{{ old('password') }}">
    /    <div class="form-group">

        <button type="submit">Enviar</button>
    <a href="{{ route('list-users')}}">Voltar</a>

</form>   