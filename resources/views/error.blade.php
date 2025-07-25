@extends('layouts.app')

@section('title', 'Error de Proyecto')

@section('content')
<div class="alert alert-danger text-center" role="alert">
    <h2 class="mb-0">Proyecto con código '{{ $id }}' no fue encontrado.</h2>
</div>
@endsection
