<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Aqua-Anita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --green: #16a34a;
            --green-dark: #15803d;
            --green-light: #f0fdf4;
        }
        body { font-family: 'Inter', sans-serif; background: #f3f4f6; }
        .sidebar {
            width: 260px; min-height: 100vh; background: #1f2937; color: #fff;
            position: fixed; top: 0; left: 0; z-index: 100;
            transition: transform 0.3s;
        }
        .sidebar .brand {
            padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; gap: 10px;
        }
        .sidebar .brand img { height: 36px; border-radius: 6px; }
        .sidebar .brand span { font-weight: 700; font-size: 16px; }
        .sidebar .nav-menu { padding: 16px 0; }
        .sidebar .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 20px; color: #9ca3af; font-size: 14px;
            text-decoration: none; transition: all 0.2s; font-weight: 500;
        }
        .sidebar .nav-item:hover, .sidebar .nav-item.active {
            color: #fff; background: rgba(255,255,255,0.08);
        }
        .sidebar .nav-item.active { border-right: 3px solid var(--green); color: var(--green); }
        .sidebar .nav-item i { width: 20px; text-align: center; }
        .main-content { margin-left: 260px; padding: 24px; }
        .top-bar {
            background: #fff; padding: 16px 24px; border-radius: 12px;
            margin-bottom: 24px; display: flex; justify-content: space-between;
            align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        .top-bar h4 { margin: 0; font-weight: 700; font-size: 18px; }
        .card-admin {
            background: #fff; border-radius: 12px; border: none;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }
        .btn-green { background-color: var(--green); color: #fff; border: none; border-radius: 8px; font-weight: 600; }
        .btn-green:hover { background-color: var(--green-dark); color: #fff; }
        .table th { font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; color: #6b7280; font-weight: 600; }
        .table td { vertical-align: middle; font-size: 14px; }
        .badge-active { background: #dcfce7; color: #16a34a; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .badge-inactive { background: #fee2e2; color: #dc2626; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .img-thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        .nav-section { padding: 0 20px; margin-top: 16px; margin-bottom: 8px; font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #6b7280; font-weight: 600; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main-content { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="brand">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Aqua-Anita">
            <div>
                <span style="display: block;">Aqua-Anita</span>
                <span style="font-size: 10px; color: #9ca3af; font-weight: 500;">Panel Admin</span>
            </div>
        </div>
        <div class="nav-menu">
            <div class="nav-section">Principal</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="{{ route('admin.contactos.index') }}" class="nav-item {{ request()->routeIs('admin.contactos.*') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Contactos
            </a>

            <div class="nav-section mt-3">Contenido</div>
            <a href="{{ route('admin.testimonios.index') }}" class="nav-item {{ request()->routeIs('admin.testimonios.*') ? 'active' : '' }}">
                <i class="fas fa-star"></i> Testimonios
            </a>
            <a href="{{ route('admin.clases.index') }}" class="nav-item {{ request()->routeIs('admin.clases.*') ? 'active' : '' }}">
                <i class="fas fa-swimming-pool"></i> Nuestras Clases
            </a>

            <div class="nav-section mt-3">Sistema</div>
            <a href="{{ url('/') }}" class="nav-item" target="_blank">
                <i class="fas fa-external-link-alt"></i> Ver Sitio Web
            </a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="nav-item" style="background:none; border:none; width:100%; cursor:pointer; text-align:left;">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Mobile toggle -->
        <button class="btn btn-sm btn-outline-secondary d-md-none mb-3" onclick="document.getElementById('sidebar').classList.toggle('open')">
            <i class="fas fa-bars"></i> Menú
        </button>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px; font-size: 14px;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; font-size: 14px;">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; font-size: 14px;">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
