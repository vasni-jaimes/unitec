@extends('layout.layout')

@section('title', 'Home')

@section('css-content')
    @vite('resources/css/general.scss')
@stop

@section("content")
    <form method="POST" action="{{ route('logout') }}" name="form-logout">
        @csrf
        <h1> Bienvenido {{ auth()->user()->fullname() }} </h1>
        <button>
            Cerrar session
        </button>
    </form>
@stop