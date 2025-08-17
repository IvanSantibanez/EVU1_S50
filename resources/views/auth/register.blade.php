@extends('layouts.app')

@section('title', 'Registro - Tech Solutions')

@section('content')
<div class="auth-container">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Crear Cuenta</h4>
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

                <form id="registerForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="100">
                        <div class="invalid-feedback" id="nameError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="6">
                        <div class="form-text">La contraseña debe tener al menos 6 caracteres.</div>
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        <div class="invalid-feedback" id="passwordConfirmationError"></div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Crear Cuenta</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p class="mb-0">¿Ya tienes una cuenta? <a href="/api/login" class="text-decoration-none">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    // Limpiar errores previos
    document.querySelectorAll('.invalid-feedback').forEach(error => error.textContent = '');
    document.querySelectorAll('.form-control').forEach(input => {
        input.classList.remove('is-invalid');
    });

    const formData = new FormData(this);
    const password = formData.get('password');
    const passwordConfirmation = formData.get('password_confirmation');

    // Validar que las contraseñas coincidan
    if (password !== passwordConfirmation) {
        document.getElementById('password_confirmation').classList.add('is-invalid');
        document.getElementById('passwordConfirmationError').textContent = 'Las contraseñas no coinciden.';
        return;
    }

    const data = {
        name: formData.get('name'),
        email: formData.get('email'),
        password: password
    };

    try {
        const response = await fetch('/api/register', {
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
            // Mostrar mensaje de éxito
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success';
            alertDiv.textContent = 'Registro exitoso. Bienvenido! Redirigiendo...';
            document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('registerForm'));

            // Redireccionar después de 2 segundos
            setTimeout(() => {
                window.location.href = '/proyectos';
            }, 2000);
        } else {
            // Mostrar errores
            if (result.message) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger';
                alertDiv.textContent = result.message;
                document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('registerForm'));
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
        document.querySelector('.card-body').insertBefore(alertDiv, document.getElementById('registerForm'));
    }
});
</script>
@endsection
