@extends('layouts.app')

@section('title', 'Obtener Proyecto')

@section('content')
<h2 class="text-center text-info-emphasis">Proyecto seleccionado con código: {{ $proyecto['id'] }}</h2>
<div class="grid grid-2 pt-4">
    <div class="project-detail-card card mt-2">
        <h3 style="color: white; margin-bottom: 1rem;">📋 Información General</h3>
        <div style="line-height: 2;">
            <div>
                <strong>🏷️ Nombre:</strong> {{ $proyecto['nombre'] }}
            </div>
            <div>
                <strong>👤 Responsable:</strong> {{ $proyecto['responsable'] }}
            </div>
            <div>
                <strong>📅 Fecha de Inicio:</strong> {{ $proyecto['fechaInicio'] }}
            </div>
        </div>
    </div>

    <div class="project-detail-card card mt-4">
        <h3 style="color: white; margin-bottom: 1rem;">💰 Información Financiera</h3>
        <div style="line-height: 2;">
            <div>
                <strong>💵 Monto:</strong> ${{ number_format($proyecto['monto'], 0, '', '.') }}
            </div>
            <div>
                <strong>📊 Estado:</strong> {{ $proyecto['estado'] }}
            </div>
        </div>
    </div>
</div>
@endsection
