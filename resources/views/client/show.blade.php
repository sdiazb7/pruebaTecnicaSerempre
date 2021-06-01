@extends('layout')

@section('title', "Cliente {$client->cod}")

@section('content')
    <div class="card">
        <h4 class="card-header">Informaciòn del cliente</h4>
        <div class="card-body">
    <p>Codigo de cliente:{{ $client->cod }}<p>
    <p>Nombre del usuario: {{ $client->name }}</p>
    @foreach ($city as $c)
    <p>Ciudad: {{ $c->name }}</p>
    @endforeach

    <p>
        <a href="{{ route('client.index') }}">Regresar al listado de usuarios</a>
    </p>
	</div>
	</div>
@endsection