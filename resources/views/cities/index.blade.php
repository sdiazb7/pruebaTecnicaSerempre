@extends('layout')

@section('title', 'Ciudad')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">Listado de ciudades</h1>
        <p>
            <a href="{{ route('cities.create') }}" class="btn btn-primary">Registrar ciudad</a>
        </p>
    </div>

    @if ($cities->isNotEmpty())
			@if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
             @endif	
    <table class="table">
        <thead class="thead">
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Opciones</th>
            
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
        <tr>
            <th scope="row">{{ $city->cod }}</th>
            <td>{{ $city->name }}</td>
          
            <td>
                <form action="{{ route('cities.destroy', $city) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('cities.show', $city) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{ route('cities.edit', $city) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
		{!! $cities->render() !!}
    @else
        <p>No hay usuarios registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection