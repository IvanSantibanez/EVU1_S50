@extends('layouts.app')

@section('title', 'Bienvenido - Tech Solutions')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="text-center mb-5">
            <h2 class="display-4 mb-3">Sistema de Gestión de Proyectos</h2>
            <p class="lead text-muted">
                Gestiona tus proyectos de manera eficiente con nuestra plataforma integral de Tech Solutions.
            </p>
        </div>

        <div class="row g-4">
            <!-- Card de Login -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-sign-in-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title">Iniciar Sesión</h5>
                        <p class="card-text text-muted">
                            Accede a tu cuenta para gestionar tus proyectos y ver información detallada.
                        </p>
                        <a href="/login" class="btn btn-primary btn-lg">
                            Iniciar Sesión
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card de Registro -->
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="fas fa-user-plus fa-3x text-success"></i>
                        </div>
                        <h5 class="card-title">Crear Cuenta</h5>
                        <p class="card-text text-muted">
                            Regístrate para comenzar a gestionar tus proyectos en nuestra plataforma.
                        </p>
                        <a href="/register" class="btn btn-success btn-lg">
                            Registrarse
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Características de la plataforma -->
        <div class="mt-5">
            <h3 class="text-center mb-4">Características de la Plataforma</h3>
            <div class="row g-3">
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <i class="fas fa-project-diagram fa-2x text-primary mb-2"></i>
                        <h6>Gestión de Proyectos</h6>
                        <small class="text-muted">Administra todos tus proyectos desde un solo lugar</small>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <i class="fas fa-chart-line fa-2x text-success mb-2"></i>
                        <h6>Seguimiento de UF</h6>
                        <small class="text-muted">Mantente al día con los valores de la UF en tiempo real</small>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="p-3">
                        <i class="fas fa-shield-alt fa-2x text-info mb-2"></i>
                        <h6>Seguridad</h6>
                        <small class="text-muted">Autenticación segura con JWT para proteger tus datos</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Agregar Font Awesome para los iconos -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
@endsection
