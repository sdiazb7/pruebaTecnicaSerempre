@extends('layout')

@section('title', "Crear Cliente")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear cliente</h4>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Por favor corrige los errores debajo:</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('clients') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Codigo:</label>
                    <input type="text" class="form-control" name="cod" id="cod"  value="{{ old('cod') }}" placeholder="Codigo">
                </div>

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Nombre">
                </div>

                  <label for="city">Ciudad:</label>
			<select name="city" class="form-control" style="margin-bottom:2em">
                <option value="0">Seleccione ciudad</option>
             @foreach ($cities as $city)  
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach                    
            </select>

                <button type="submit" class="btn btn-primary">Registrar cliente</button>
                <a href="{{ route('client.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
            </form>
        </div>
    </div>
					@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
             @endif
@endsection