@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">Listado de clientes</h1>
        <p>
            <a href="{{ route('client.create') }}" class="btn btn-primary">Registar Cliente</a>
        </p>
    </div>

    @if ($client->isNotEmpty())
	

				@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
             @endif

	<form action="{{route('client.index')}}" method="get">
	<div class="form-row">
	<div class="col-sm-4 my-1">
	<input type="text" class="form-control" name="text" placeholder="Buscar clientes por ciudad">
	</div>
	<div class="col-auto my-l">
	<input type="submit" class="btn btn-primary" value="Buscar">
	</div>
	</form>
    <table class="table" style="margin-top:2em">
        <thead class="thead">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Ciudad</th>
			<th scope="col">Imagen</th>
			<th scope="col">Opciones</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($client as $c)
        <tr>
            <th scope="row">{{ $c->cod }}</th>
            <td>{{ $c->name }}</td>
            <td>{{ $c->city }}</td>
			<td><image src="{{asset('storage').'/'.$c->image }}" width="200"></image></td> 
            <td>
                <form action="{{ route('client.destroy', $c) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('client.show', $c) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{ route('client.edit', $c) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
		{!! $client->render() !!}
    @else
        <p>No hay usuarios registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection