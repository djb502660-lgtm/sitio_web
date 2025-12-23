<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Gestión')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #0ea5e9;
            --light: #f8fafc;
            --dark: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: var(--dark);
            color: white;
            padding: 20px;
            overflow-y: auto;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: bold;
            color: var(--primary);
        }

        .sidebar .nav-menu {
            list-style: none;
        }

        .sidebar .nav-menu li {
            margin-bottom: 10px;
        }

        .sidebar .nav-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-menu a:hover,
        .sidebar .nav-menu a.active {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding-left: 20px;
        }

        .sidebar .nav-menu a i {
            width: 20px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .search-box {
            flex: 1;
            max-width: 400px;
            position: relative;
        }

        .header .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .header .search-box input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .header .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .header .header-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px 12px 0 0;
            padding: 20px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-card .icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .stat-card .number {
            font-size: 28px;
            font-weight: bold;
            color: var(--dark);
        }

        .stat-card .label {
            color: #94a3b8;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Tables */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: var(--dark);
            font-weight: 600;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #e2e8f0;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        /* Badges */
        .badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
            border-left: 4px solid var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #7f1d1d;
            border-left: 4px solid var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transition: width 0.3s;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.show {
                width: 250px;
                z-index: 1000;
            }

            .content {
                padding: 20px;
            }
        }

        /* Page Title */
        .page-title {
            color: var(--dark);
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #64748b;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="brand">
                <i class="bi bi-gear-fill"></i>
                <span>SysGest</span>
            </div>

            <ul class="nav-menu">
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <i class="bi bi-box"></i>
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings') }}" class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="bi bi-sliders"></i>
                        <span>Configuración</span>
                    </a>
                </li>
                <li style="margin-top: 20px; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Buscar...">
                </div>

                <div class="header-actions">
                    <button class="btn btn-light position-relative">
                        <i class="bi bi-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </button>

                    <div class="user-profile">
                        <div>
                            <p class="mb-0" style="font-size: 14px; color: var(--dark); font-weight: 600;">
                                @if(auth()->check())
                                    {{ auth()->user()->name }}
                                @else
                                    Usuario
                                @endif
                            </p>
                            <p class="mb-0" style="font-size: 12px; color: #94a3b8;">Administrador</p>
                        </div>
                        <div class="user-avatar">
                            @if(auth()->check())
                                {{ substr(auth()->user()->name, 0, 1) }}
                            @else
                                U
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
