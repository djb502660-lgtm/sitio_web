<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .auth-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 450px;
        }

        .auth-header {
            background: var(--gradient);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }

        .auth-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .auth-header p {
            opacity: 0.9;
            font-size: 14px;
        }

        .auth-body {
            padding: 40px 30px;
        }

        .form-label {
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
        }

        .btn-primary {
            background: var(--gradient);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
        }

        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .auth-footer {
            padding: 20px 30px;
            text-align: center;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .auth-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        .invalid-feedback {
            display: block;
            color: #ef4444;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-header">
            <i class="bi bi-box-arrow-in-right" style="font-size: 48px; margin-bottom: 15px;"></i>
            <h1>Iniciar Sesión</h1>
            <p>Accede a tu cuenta</p>
        </div>

        <div class="auth-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>¡Error!</strong> Por favor verifica los siguientes errores:
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope"></i> Correo Electrónico
                    </label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus
                           placeholder="tu@email.com">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        <i class="bi bi-lock"></i> Contraseña
                    </label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" 
                           name="password" 
                           required
                           placeholder="••••••••">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="remember" 
                               name="remember">
                        <label class="form-check-label" for="remember">
                            Recordarme
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                </button>
            </form>
        </div>

        <div class="auth-footer">
            <p class="mb-0">
                ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

