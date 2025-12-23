<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión - Bienvenido</title>
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .welcome-container {
            width: 100%;
            padding: 40px 20px;
        }

        .welcome-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .welcome-content {
            padding: 60px 40px;
            text-align: center;
        }

        .welcome-icon {
            font-size: 80px;
            color: var(--primary);
            margin-bottom: 30px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .welcome-title {
            font-size: 48px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 15px;
        }

        .welcome-subtitle {
            font-size: 18px;
            color: #64748b;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 50px 0;
        }

        .feature-card {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: #e0e7ff;
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .feature-title {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn-welcome {
            padding: 14px 35px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-primary-welcome {
            background: var(--gradient);
            color: white;
        }

        .btn-primary-welcome:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
            color: white;
        }

        .btn-secondary-welcome {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary-welcome:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        .welcome-footer {
            background: #f8fafc;
            padding: 30px 40px;
            text-align: center;
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .welcome-content {
                padding: 40px 20px;
            }

            .welcome-title {
                font-size: 32px;
            }

            .welcome-subtitle {
                font-size: 16px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-welcome {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="welcome-card">
                    <div class="welcome-content">
                        <div class="welcome-icon">
                            <i class="bi bi-gear-fill"></i>
                        </div>

                        <h1 class="welcome-title">Sistema de Gestión</h1>
                        <p class="welcome-subtitle">
                            Bienvenido a tu plataforma integral de administración.<br>
                            Gestiona productos, categorías y usuarios de manera eficiente.
                        </p>

                        <div class="features-grid">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-box"></i>
                                </div>
                                <div class="feature-title">Gestión de Productos</div>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-tags"></i>
                                </div>
                                <div class="feature-title">Categorías Dinámicas</div>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="feature-title">Usuarios del Sistema</div>
                            </div>

                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi bi-speedometer2"></i>
                                </div>
                                <div class="feature-title">Dashboard Dinámico</div>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <a href="{{ route('login') }}" class="btn-welcome btn-primary-welcome">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="btn-welcome btn-secondary-welcome">
                                <i class="bi bi-person-plus"></i> Registrarse
                            </a>
                        </div>
                    </div>

                    <div class="welcome-footer">
                        <p class="mb-0">
                            <i class="bi bi-info-circle"></i> Sistema de Gestión v1.0 | Desarrollado con Laravel
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
