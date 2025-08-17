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
                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="loginForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">¿No tienes una cuenta? <a href="/api/register" class="text-decoration-none">Regístrate aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Limpiar errores previos
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.querySelectorAll('.form-control').forEach(input => {
        input.classList.remove('is-invalid');
    });

    const formData = new FormData(this);
    const data = {
        email: formData.get('email'),
        password: formData.get('password')
    };

    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

            if (response.ok) {
            // Guardar token en localStorage
            localStorage.setItem('token', result.token);
            // Actualizar navbar dinámicamente si la función está disponible
            try { if (window.updateNavAuth) window.updateNavAuth(); } catch(e) { /* ignore */ }
            // Mostrar mensaje de éxito
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.textContent = 'Inicio de sesión exitoso. Redirigiendo...';
            document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('loginForm'));

            // Redireccionar después de 2 segundos
            setTimeout(() => {
                window.location.href = '/proyectos';
            }, 2000);
        } else {
            // Mostrar errores
            if (result.error) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger';
                alertDiv.textContent = result.error;
                document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('loginForm'));
            }

            if (result.errors) {
                Object.keys(result.errors).forEach(field => {
                    const input = document.getElementById(field);
                    const errorDiv = document.getElementById(field + 'Error');
                    if (input && errorDiv) {
                        input.classList.add('is-invalid');
                        errorDiv.textContent = result.errors[field][0];
                    }
                });
            }
        }
    } catch (error) {
        console.error('Error:', error);
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-danger';
        alertDiv.textContent = 'Error de conexión. Por favor, intenta nuevamente.';
        document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('loginForm'));
    }
});
</script>
@endsection
