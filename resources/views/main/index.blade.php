@extends('app.base')

@section('content')
<form method="POST" action="{{ url('login') }}">
    @csrf
    @error('email')
        <div class="alert alert-danger">Email is required</div>
    @enderror
    @if(session()->has('user'))
        <a href="{{ route('logout') }}" class="btn btn-primary ml-4 mt-3">Logout</a>
    @else
        <label class="text-white ml-4 mt-5">Sign In</label>
        <input value="{{old('email')}}" name="email" class="form-control w-50 ml-4" placeholder="Enter email" >
        <button type="submit" class="btn btn-primary ml-4 mt-3">Sign In</button><br/>
</form>
<form method="POST" action="{{ url('signin') }}">
        @csrf
        <label class="text-white ml-4 mt-5">Register</label>
        <input value="{{old('nombre')}}" name="nombre" class="form-control w-50 ml-4 mb-4" placeholder="Enter name" >
        @error('nombre')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
            <input value="{{old('correo')}}" name="correo" class="form-control w-50 ml-4 mb-4" placeholder="Enter email" >
        @error('correo')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
            <input value="{{old('fecha')}}" name="fecha" type="date" class="form-control w-25 ml-4">
        @error('fecha')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <button class="btn btn-primary ml-4 mt-3">Log In</button>
    @endif
</form>
@endsection


<!--Para saber que está loggeado el usuaro en todas las ventanas $request->session()->put('email', 'correo@.....')-->
<!--Para saber que hay dentro de session $email = $request->session()->get('email');-->
<!--Implementamos en la interfaz blade, $post->create_at, hora actual, calcular diferencia-->
<!--Para hacer el delete hay que comprobar otra vez que la hora de creacion y la actual es <5min-->
<!--Para saber el id del usuraio en $post->iduser = $request->session()->get('user')->id;-->


