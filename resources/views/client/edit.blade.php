@extends('layout')

@section('title', "Editar cliente")

@section('content')
    <div class="card">
        <h4 class="card-header">Editar cliente</h4>
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

    <form method="POST" action="{{ url("client/{$client->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div class="form-group">
		<label for="name">Codigo:</label>
        <input type="text" name="cod" id="cod" class="form-control" value="{{ old('cod', $client->cod) }}" placeholder="Codigo">
        </div>
        <div class="form-group">
		<label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name) }}" placeholder="Nombre">
        </div>
		<div class="form-group">
            <label for="city">Ciudad:</label>
            <select name="city" class="form-control">
        @foreach($city as $c)       
                <option value="{{ old('city', $c->id) }}">{{ $c->name }}</option>
        @endforeach     
        @foreach($cities as $cies)       
                <option value="{{ old('city', $cies->id) }}">{{ $cies->name }}</option>
        @endforeach      
        </select>
        </div>
		<button type="submit" class="btn btn-primary">Actualizar cliente</button>
    </form>

    <p>
        <a href="{{ route('client.index') }}">Regresar al listado de cliente</a>
    </p>
	        </div>
    </div>
	
	@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
             @endif
@endsection