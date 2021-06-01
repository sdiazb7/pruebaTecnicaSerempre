@extends('layout')

@section('title', "Ciudad {$cities->id}")

@section('content')
    <div class="card">
        <h4 class="card-header">Informaciòn del cliente</h4>
        <div class="card-body">
    <p>Codigo de ciudad: {{ $cities->cod }}</p>

    <p>Nombre de la ciudad: {{ $cities->name }}</p>
    
    <p>
        <a href="{{ route('cities.index') }}">Regresar al listado de ciudades</a>
    </p>
	</div>
	</div>	
@endsection