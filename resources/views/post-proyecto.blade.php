@extends('layouts.app')

@section('title', 'Agregar Proyecto')

@section('content')
   <div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="alert alert-success text-center" role="alert">
                <h2 class="mb-0">El proyecto se ha creado exitosamente.</h2>
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
        </div>
    </div>
</div>
@endsection
