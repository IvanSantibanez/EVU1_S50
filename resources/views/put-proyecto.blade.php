@extends('layouts.app')

@section('title', 'Modificar Proyecto')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success_project'))
            <div class="alert alert-info text-center" role="alert">
                <h2 class="mb-0">El proyecto ha sido modificado exitosamente.</h2>
            </div>

            <div class="card shadow-sm border-dark">
                <div class="card-header bg-dark text-white text-center">
                    <h4 class="mb-0">{{ $proyecto['nombre'] }}</h4>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>ID del Proyecto:</strong> {{ session('success_project')['data']['id'] }}</p>
                    <p class="card-text"><strong>Fecha de Inicio:</strong> {{ session('success_project')['data']['fechaInicio'] }}</p>
                    <p class="card-text"><strong>Estado:</strong> {{ session('success_project')['data']['estado'] }}</p>
                    <p class="card-text"><strong>Responsable:</strong> {{ session('success_project')['data']['responsable'] }}</p>
                    <p class="card-text"><strong>Monto:</strong> ${{ number_format(session('success_project')['data']['monto'], 0, '', '.') }}</p>
                </div>
            </div>

            @else
                <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Editar Proyecto</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('proyectos.edit', $proyecto['id']) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Proyecto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proyecto['nombre']) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{ old('fechaInicio', $proyecto['fechaInicio']) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado', $proyecto['estado']) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="responsable" class="form-label">Responsable</label>
                            <input type="text" class="form-control" id="responsable" name="responsable" value="{{ old('responsable', $proyecto['responsable']) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="monto" class="form-label">Monto</label>
                            <input type="number" class="form-control" id="monto" name="monto" value="{{ old('monto', $proyecto['monto']) }}" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar Proyecto</button>
                        </div>
                    </form>
                </div>
            </div>

            @endif
        </div>
    </div>
</div>



@endsection
