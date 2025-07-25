@extends('layouts.app')

@section('title', 'Modificar Proyecto')

@section('content')
<div class="alert alert-info text-center" role="alert">
    <h2 class="mb-0">El proyecto '{{ $proyecto['nombre'] }}' ha sido modificado exitosamente.</h2>
</div>

<div class="card shadow-sm border-dark">
    <div class="card-header bg-dark text-white text-center">
        <h4 class="mb-0">{{ $proyecto['nombre'] }}</h4>
    </div>
    <div class="card-body">
        <p class="card-text"><strong>ID del Proyecto:</strong> {{ $proyecto['id'] }}</p>
        <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $proyecto['fechaInicio'] }}</p>
        <p class="card-text"><strong>Estado:</strong> {{ $proyecto['estado'] }}</p>
        <p class="card-text"><strong>Responsable:</strong> {{ $proyecto['responsable'] }}</p>
        <p class="card-text"><strong>Monto:</strong> ${{ number_format($proyecto['monto'], 0, '', '.') }}</p>
    </div>
</div>
@endsection
