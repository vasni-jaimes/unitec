@extends('layout.layout')

@section('title', 'Register')

@section('css-content')
    @vite('resources/css/register.scss')
@stop


@section("content")
    <form name="form-register" method="POST" action="{{ route('register.store') }}">
        @csrf
        <h1> Registro </h1>
        <div class="item-col">
            <label for="nombres">Nombre(s): </label>
            <input type="text" name="name" />
            <span class="error">{!! $errors->first('name') !!}</span>
        </div>
        <div class="item-col">
            <div class="item-xl-50">
                <label for="apaterno">Apellido Paterno: </label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" />
                <span class="error">{!! $errors->first('last_name') !!}</span>
            </div>
            <div class="item-xl-50">
                <label for="amaterno">Apellido Materno: </label>
                <input type="text" name="mother_last_name" value="{{ old('mother_last_name') }}" />
                <span class="error">{!! $errors->first('mother_last_name') !!}</span>
            </div>
        </div>
        <div class="item-col">
            <div class="item-xl-30">
                <label for="gender">Genero: </label>
                <select name="gender">
                    @foreach ($genders as $gender)
                        <option 
                            value="{{ $gender->id }}" 
                            {{ old('gender') == $gender->id ? 'selected' : '' }}>

                            {{ $gender->name }} 
                        </option>
                    @endforeach
                </select>
                <span class="error">{!! $errors->first('gender') !!}</span>
            </div>
            <div class="item-xl-30">
                <label for="age">Edad: </label>
                <select name="age">
                    @for ($i = 18; $i <= 80; $i++)  
                        <option 
                            value="{{ $i }}" 
                            {{ old('age') == $i ? 'selected' : '' }}>

                            {{ $i }}
                        </option>
                    @endfor
                </select>
                <span class="error">{!! $errors->first('age') !!}</span>
            </div>
            <div class="item-xl-30">
                <label for="marital_status">Estado Civil: </label>
                <select name="marital_status">
                    @foreach ($maritalStatuses as $maritalStatus)
                        <option 
                            value="{{ $maritalStatus->id }}"
                            {{ old('marital_status') == $maritalStatus->id ? 'selected' : '' }}>

                            {{ $maritalStatus->name }} 
                        </option>
                    @endforeach
                </select>
                <span class="error">{!! $errors->first('marital_status') !!}</span>
            </div>
        </div>
        <div class="item-col">
            <div class="item-xl-50">
                <label for="education_level">Nivel de interes: </label>
                <select name="education_level">
                    <option value="0">Escoge una opcion</option>
                    @foreach ($educationLevels as $educationLevel)
                        <option value="{{ $educationLevel->id }}"> {{ $educationLevel->name }} </option>
                    @endforeach
                </select>
                <span class="error">{!! $errors->first('education_level') !!}</span>
            </div>

            <div class="item-xl-50">
                <label for="career">Carrera: </label>
                <select name="career">
                    <option>No hay carreras</option>
                </select>
                <span class="error">{!! $errors->first('career') !!}</span>
            </div>
        </div>
        <div class="item-col">
            <label for="email">E-mail: </label>
            <input type="text" name="email" value="{{ old('email') }}" />
            <span class="error">{!! $errors->first('email') !!}</span>
        </div>
        <div class="item-col">
            <label for="passowrd">Contraseña: </label>
            <input type="password" name="password" />
            <span class="error">{!! $errors->first('password') !!}</span>
        </div>
        <button>
            Registrar
        </button>
    </form> 
@stop

@section('js-content')
    @vite('resources/js/register.js')
@stop