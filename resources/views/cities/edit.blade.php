@extends('layout')

@section('title', "Editar Ciudad")

@section('content')
    <div class="card">
        <h4 class="card-header">Editar ciudad</h4>
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

    <form method="POST" action="{{ url("cities/{$cities->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <label for="cod">Codigo:</label>
        <input type="text" name="cod" id="cod" class="form-control" value="{{ old('cod', $cities->cod) }}" placeholder="Codigo">
        <br>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $cities->name) }}" placeholder="Nombre">
        <br>
        <button type="submit" class="btn btn-primary">Actualizar ciudad</button>
    </form>

    <p>
        <a href="{{ route('cities.index') }}">Regresar al listado de cliente</a>
    </p>
	</div>
	</div>
			@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
             @endif	
@endsection