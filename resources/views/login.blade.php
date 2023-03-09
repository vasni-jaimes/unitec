@extends('layout.layout')

@section('title', 'Login')

@section('css-content')
    @vite('resources/css/login.scss')
@stop


@section("content")
    <form method="POST" action="{{ route('login.store') }}" name="form-login">
        @csrf
        <h1> Login </h1>

        <div class="item-col">
            <label for="email">E-mail: </label>
            <input type="text" name="email" value="{{ old('email') }}" />
            <span class="error">{!! $errors->first('email') !!}</span>
        </div>
        
        <div class="item-col">
            <label for="password">Contraseña: </label>
            <input type="password" name="password" />
            <span class="error">{!! $errors->first('password') !!}</span>
        </div>
        
        <button>
            Entrar
        </button>

        <p>¿No tienes cuenta? <a href="{{ route('register.index') }}"> Registrate </a></p>
    </form> 
@stop

@section('js-content')
    @vite('resources/js/login.js')
@stop