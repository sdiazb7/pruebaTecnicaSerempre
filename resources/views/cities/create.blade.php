@extends('layout')

@section('title', "Crear Ciudad")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear ciudad</h4>
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

            <form method="POST" action="{{ url('cities') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Codigo:</label>
                    <input type="text" class="form-control" name="cod" id="cod"  value="{{ old('cod') }}" placeholder="Codigo">
                </div>

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Nombre">
                </div>


                <button type="submit" class="btn btn-primary">Crear ciudad</button>
                <a href="{{ route('cities.index') }}" class="btn btn-link">Regresar al listado de ciudades</a>
            </form>
			

        </div>
    </div>
	
				@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
             @endif
	
@endsection