@extends('layouts.app')

@section('title', 'eliminar Proyecto')

@section('content')
<div class="alert alert-success text-center" role="alert">
    <h2 class="mb-0">El proyecto '{{ $proyecto['nombre'] }}' ha sido eliminado exitosamente.</h2>
</div>
@endsection
