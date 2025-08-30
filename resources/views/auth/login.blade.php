@extends('layouts.app')

@section('title', 'Iniciar Sesión - Tech Solutions')

@section('content')
<div class="auth-container">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Iniciar Sesión</h4>
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <p class="mb-0">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-decoration-none">Regístrate aquí</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
