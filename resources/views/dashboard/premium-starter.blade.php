<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Premium - EJOY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #4CAF50;
            --secondary: #2E7D32;
            --accent: #FF9800;
            --light: #E8F5E9;
            --dark: #1B5E20;
            --gradient: linear-gradient(135deg, #4CAF50, #2E7D32);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8f9fa;
            min-height: 100vh;
        }

        .premium-badge {
            background: var(--gradient);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .navbar-premium {
            background: white;
            box-shadow: 0 4px 20px rgba(76, 175, 80, 0.15);
            border-bottom: 3px solid var(--primary);
        }

        .sidebar {
            background: white;
            min-height: calc(100vh - 73px);
            box-shadow: 5px 0 15px rgba(0,0,0,0.05);
            border-right: 1px solid #eee;
        }

        .sidebar-item {
            padding: 12px 20px;
            color: #666;
            text-decoration: none;
            display: block;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            margin: 5px 0;
        }

        .sidebar-item:hover, .sidebar-item.active {
            background: var(--light);
            color: var(--primary);
            border-left: 4px solid var(--primary);
        }

        .sidebar-item i {
            width: 24px;
            text-align: center;
            margin-right: 10px;
        }

        .main-content {
            padding: 25px;
        }

        .card-premium {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.1);
            transition: transform 0.3s;
            overflow: hidden;
            border-top: 4px solid var(--primary);
            background: white;
        }

        .card-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.15);
        }

        .card-header-premium {
            background: var(--gradient);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 15px 20px;
            border: none;
            font-weight: 600;
        }

        .btn-premium {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
            color: white;
        }

        .daily-menu-card {
            background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
            border-radius: 15px;
            padding: 20px;
            border: 2px solid var(--primary);
        }

        .menu-icon {
            width: 50px;
            height: 50px;
            background: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
        }

        .planner-task {
            padding: 12px;
            background: white;
            border-radius: 10px;
            margin-bottom: 8px;
            border-left: 4px solid var(--accent);
            transition: all 0.3s;
            border: 1px solid #eee;
            cursor: pointer;
            position: relative;
        }

        .planner-task:hover {
            transform: translateX(3px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .planner-task.completed {
            opacity: 0.8;
            background: #f5f5f5;
            border-left-color: #4CAF50;
        }

        .planner-task.admin-task {
            border-left-color: #9C27B0;
        }

        .planner-task.user-task {
            border-left-color: #2196F3;
        }

        .recipe-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
            height: 100%;
            transition: all 0.3s;
            cursor: pointer;
        }

        .recipe-card:hover {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.1);
            transform: translateY(-2px);
        }

        .progress-premium {
            height: 8px;
            border-radius: 4px;
            background: #e0e0e0;
        }

        .progress-premium .progress-bar {
            background: var(--gradient);
            border-radius: 4px;
        }

        .feature-tag {
            display: inline-block;
            background: rgba(76, 175, 80, 0.1);
            color: var(--primary);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1rem;
        }

        .stats-card {
            text-align: center;
            padding: 15px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .stats-card i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .stats-card h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .stats-card p {
            color: #666;
            font-size: 0.85rem;
            margin: 0;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .weight-input-form {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }

        .blog-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .blog-card h5 {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .blog-card .blog-category {
            display: inline-block;
            background: var(--light);
            color: var(--primary);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-bottom: 10px;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .recipe-modal-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .recipe-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .pagination .page-link {
            color: var(--primary);
            margin: 0 3px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .pagination .page-link:hover {
            background-color: var(--light);
            border-color: var(--primary);
        }

        .article-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .article-card:hover {
            border-color: var(--primary);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.1);
        }

        .article-card h6 {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .article-card .article-excerpt {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .progress-circle-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px;
        }

        .progress-circle-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-weight: bold;
            color: var(--primary);
        }

        .progress-circle-text h2 {
            margin-bottom: 0;
            font-weight: 700;
        }

        .progress-circle-text small {
            font-size: 0.8rem;
            color: #666;
        }

        .delete-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #ff4757;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .planner-task:hover .delete-btn {
            opacity: 1;
        }

        .task-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 10px;
            background: #e0e0e0;
            color: #666;
        }

        .admin-badge {
            background: #E1BEE7;
            color: #7B1FA2;
        }

        .user-badge {
            background: #BBDEFB;
            color: #1565C0;
        }

        /* Settings Modal */
        .settings-modal .modal-content {
            border-radius: 15px;
            border: none;
        }

        .settings-modal .modal-header {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .settings-item {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .settings-item:last-child {
            border-bottom: none;
        }

        .settings-item label {
            margin-bottom: 0;
            font-weight: 500;
        }

        .premium-feature-note {
            background: linear-gradient(135deg, #FFF8E1, #FFECB3);
            border-left: 4px solid #FF9800;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .premium-feature-note i {
            color: #FF9800;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-premium navbar-expand-lg py-3">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <a class="navbar-brand fw-bold text-dark" href="{{ route('dashboard.premium.starter') }}">
                    <i class="bi bi-egg-fried me-2" style="color: var(--primary);"></i>EatJoy
                </a>
                <span class="premium-badge ms-2">
                    <i class="bi bi-star-fill me-1"></i>STARTER
                </span>
            </div>

            <div class="d-flex align-items-center">
                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <div class="user-avatar me-2">
                            {{ substr($user->nickname, 0, 2) }}
                        </div>
                        <div class="text-start">
                            <div class="fw-bold">{{ $user->nickname }}</div>
                            <small class="text-muted">Target: -{{ number_format($user->weight_difference, 1) }}kg</small>
                        </div>
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModalStarter">
                            <i class="bi bi-person me-2"></i>Profil
                        </a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#settingsModalStarter">
                            <i class="bi bi-gear me-2"></i>Pengaturan
                        </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 px-0">
                <div class="sidebar">
                    <div class="p-4">
                        <h5 class="fw-bold mb-4" style="color: var(--primary);">
                            <i class="bi bi-menu-button-wide"></i> Fitur Premium
                        </h5>
                        <a href="{{ route('dashboard.premium.starter') }}" class="sidebar-item {{ Request::route()->getName() == 'dashboard.premium.starter' ? 'active' : '' }}">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                        <a href="{{ route('recipes.my') }}" class="sidebar-item">
                            <i class="bi bi-journal"></i> Menu Saya
                        </a>
                        <a href="{{ route('recipes.create') }}" class="sidebar-item">
                            <i class="bi bi-plus-circle"></i> Create Menu
                        </a>
                        <a href="#daily-planner-section" class="sidebar-item" onclick="scrollToSection('daily-planner-section')">
                            <i class="bi bi-calendar-check"></i> Daily Planner
                        </a>
                        <a href="#recipes-section" class="sidebar-item" onclick="scrollToSection('recipes-section')">
                            <i class="bi bi-egg-fried"></i> 24+ Menu Diet
                        </a>
                        <a href="#progress-section" class="sidebar-item" onclick="scrollToSection('progress-section')">
                            <i class="bi bi-bar-chart"></i> Progress
                        </a>
                        <a href="{{ route('subscription.plans') }}" class="sidebar-item">
                            <i class="bi bi-credit-card"></i> Subscription
                        </a>
                    </div>

                    <div class="px-4 mt-4">
                        <div class="card-premium">
                            <div class="card-body text-center p-3">
                                <small class="text-muted">Paket Aktif</small>
                                <h5 class="fw-bold mt-2 mb-2" style="color: var(--primary);">EatJoy Starter</h5>
                                <p class="text-muted small mb-3">Berlaku hingga: {{ now()->addDays(30)->format('d M Y') }}</p>

                                <div class="mb-3">
                                    <div class="progress-premium">
                                        <div class="progress-bar" style="width: {{ $progress['percentage'] ?? 0 }}%"></div>
                                    </div>
                                    <small class="text-muted">Progress: {{ $progress['percentage'] ?? 0 }}%</small>
                                </div>

                                <a href="{{ route('subscription.plans') }}" class="btn btn-outline-primary btn-sm w-100">
                                    <i class="bi bi-rocket"></i> Upgrade ke Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-10">
                <div class="main-content">
                    <!-- Welcome Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card-premium">
                                <div class="card-body p-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-8">
                                            <h3 class="fw-bold mb-2">Selamat Datang, {{ $user->nickname }}! 👋</h3>
                                            <p class="text-muted mb-3">
                                                Anda sudah berlangganan <strong class="text-primary">EatJoy Starter</strong>.
                                                Nikmati semua fitur premium untuk mendukung program diet Anda.
                                            </p>
                                            <div class="d-flex gap-2 flex-wrap">
                                                <span class="feature-tag"><i class="bi bi-check-circle me-1"></i> Daily Planner</span>
                                                <span class="feature-tag"><i class="bi bi-check-circle me-1"></i> Personalized Menu</span>
                                                <span class="feature-tag"><i class="bi bi-check-circle me-1"></i> 24+ Menu Diet</span>
                                                <span class="feature-tag"><i class="bi bi-check-circle me-1"></i> Progress Tracking</span>
                                                <span class="feature-tag"><i class="bi bi-check-circle me-1"></i> Create Menu</span>
                                            </div>

                                            <!-- Note tentang Premium Dish -->
                                            <div class="premium-feature-note mt-3">
                                                <i class="bi bi-info-circle me-2"></i>
                                                <strong>Fitur Premium Dish:</strong> Akses ke menu premium tersedia di halaman <a href="{{ route('recipes.my') }}" class="text-primary">Menu Saya</a>. Anda dapat membuat menu dan menandainya sebagai premium.
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="daily-menu-card">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="menu-icon me-3">
                                                        <i class="bi bi-egg-fried"></i>
                                                    </div>
                                                    <div>
                                                        <h5 class="fw-bold mb-0">Menu Hari Ini</h5>
                                                        <small class="text-muted">{{ now()->translatedFormat('l, d F Y') }}</small>
                                                    </div>
                                                </div>
                                                <h4 class="fw-bold mb-2" id="dailyMenuNameStarter">{{ $dailyMenu['name'] ?? 'Menu Personal' }}</h4>
                                                <p class="text-muted mb-2" id="dailyMenuInfoStarter">
                                                    <i class="bi bi-fire"></i> <span id="dailyMenuCaloriesStarter">{{ $dailyMenu['calories'] ?? '350' }}</span> Kalori •
                                                    <i class="bi bi-clock"></i> <span id="dailyMenuTimeStarter">{{ $dailyMenu['time'] ?? '20 menit' }}</span>
                                                </p>
                                                <button class="btn-premium btn-sm w-100 refresh-menu-starter"
                                                        data-refresh-left="{{ $refreshLeft ?? 3 }}"
                                                        data-user-id="{{ $user->id }}"
                                                        data-plan="starter">
                                                    <i class="bi bi-arrow-clockwise"></i>
                                                    @if(($refreshLeft ?? 3) > 0)
                                                        Refresh Menu ({{ $refreshLeft ?? 3 }}x tersisa)
                                                    @else
                                                        Refresh Habis - Coba Besok
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Overview -->
                    <div class="row mb-4">
                        <div class="col-md-3 mb-3">
                            <div class="stats-card">
                                <i class="bi bi-graph-up"></i>
                                <h4>{{ $progress['percentage'] ?? 0 }}%</h4>
                                <p>Progress Target</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stats-card">
                                <i class="bi bi-fire"></i>
                                <h4>{{ $userRecipes->count() }}</h4>
                                <p>Menu Dibuat</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stats-card">
                                <i class="bi bi-calendar-check"></i>
                                <h4>{{ $progress['streak_days'] ?? 0 }}</h4>
                                <p>Hari Berjalan</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stats-card">
                                <i class="bi bi-trophy"></i>
                                <h4>{{ $progress['weight_lost'] ?? '0.0' }} kg</h4>
                                <p>Berat Turun</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Dashboard Content -->
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-lg-8">
                            <!-- Menu Diet Section dengan Pagination (8, 8, 8) -->
                            <div id="recipes-section" class="card-premium mb-4">
                                <div class="card-header-premium">
                                    <h5 class="mb-0">
                                        <i class="bi bi-egg-fried me-2"></i> Menu Diet Rekomendasi
                                        <small class="ms-2" id="recipePageInfo">1/3</small>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted small mb-3">24 menu diet sehat pilihan untuk Anda</p>

                                    <div class="recipe-grid" id="recipeGrid">
                                        <!-- Recipes will be loaded here via JavaScript -->
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-container">
                                        <nav aria-label="Recipe navigation">
                                            <ul class="pagination" id="recipePagination">
                                                <!-- Pagination will be generated by JavaScript -->
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- Daily Planner Section - FIXED -->
                            <div id="daily-planner-section" class="card-premium mb-4">
                                <div class="card-header-premium">
                                    <h5 class="mb-0">
                                        <i class="bi bi-calendar-check me-2"></i> Daily Planner
                                        <span class="badge bg-light text-dark ms-2" id="progressBadge">0/5 selesai</span>
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h6 class="fw-bold mb-3">Aktivitas Hari Ini</h6>
                                            <div id="plannerTasks">
                                                <!-- Default tasks akan dimuat oleh JavaScript -->
                                            </div>

                                            <div class="text-center mt-3">
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                                                    <i class="bi bi-plus"></i> Tambah Aktivitas Baru
                                                </button>
                                                <small class="text-muted d-block mt-1">Tambah aktivitas Anda sendiri</small>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <h6 class="fw-bold mb-3">Progress Harian</h6>
                                            <div class="text-center p-4">
                                                <!-- Progress Circle - FIXED -->
                                                <div class="progress-circle-container">
                                                    <canvas id="dailyProgressCircle" width="150" height="150"></canvas>
                                                    <div class="progress-circle-text">
                                                        <h2 id="progressPercentage">0%</h2>
                                                        <small>Selesai</small>
                                                    </div>
                                                </div>

                                                <!-- Progress Bar -->
                                                <div class="mb-4">
                                                    <div class="progress-premium mb-2">
                                                        <div class="progress-bar" id="dailyProgressBar" style="width: 0%"></div>
                                                    </div>
                                                    <small class="text-muted" id="progressText">0 dari 5 aktivitas selesai</small>
                                                </div>

                                                <!-- Stats -->
                                                <div class="row text-center mb-4">
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2" id="adminTasksCount">5</h5>
                                                        <small class="text-muted">Admin Tasks</small>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2" id="userTasksCount">0</h5>
                                                        <small class="text-muted">User Tasks</small>
                                                    </div>
                                                </div>

                                                <button class="btn-premium w-100" data-bs-toggle="modal" data-bs-target="#addActivityModal">
                                                    <i class="bi bi-plus-circle"></i> Tambah Aktivitas
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Progress Section dengan Grafik yang Diperbesar -->
                            <div id="progress-section" class="card-premium mb-4">
                                <div class="card-header-premium">
                                    <h5 class="mb-0">
                                        <i class="bi bi-bar-chart me-2"></i> Progress Berat Badan
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="chart-container">
                                                <canvas id="weightChart"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="weight-input-form">
                                                <h6 class="fw-bold mb-3">Update Berat Badan</h6>
                                                <form id="weightForm">
                                                    <div class="mb-3">
                                                        <label class="form-label">Berat Badan (kg)</label>
                                                        <input type="number" class="form-control" id="weightInput"
                                                               step="0.1" min="30" max="300"
                                                               placeholder="Contoh: 75.5" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal</label>
                                                        <input type="date" class="form-control" id="weightDate"
                                                               value="{{ date('Y-m-d') }}" required>
                                                    </div>
                                                    <button type="submit" class="btn-premium w-100">
                                                        <i class="bi bi-save"></i> Simpan Progress
                                                    </button>
                                                </form>
                                                <hr class="my-3">
                                                <div class="text-center">
                                                    <h6 class="fw-bold">Statistik</h6>
                                                    <p class="mb-1">Berat Awal: <strong><span id="initialWeight">{{ $user->initial_weight ?? $user->current_weight }}</span> kg</strong></p>
                                                    <p class="mb-1">Target: <strong><span id="targetWeight">{{ $user->target_weight }}</span> kg</strong></p>
                                                    <p class="mb-1">Selisih: <strong><span id="weightDifference">{{ number_format($user->weight_difference, 1) }}</span> kg</strong></p>
                                                    <p class="mb-0">Progress: <strong class="text-primary"><span id="currentProgress">{{ $progress['percentage'] ?? 0 }}</span>%</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-lg-4">
                            <!-- Blog/Artikel Section -->
                            <div class="card-premium mb-4">
                                <div class="card-header-premium">
                                    <h5 class="mb-0">
                                        <i class="bi bi-newspaper me-2"></i> Artikel & Tips Diet Terbaru
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <!-- Artikel 1 -->
                                    <div class="article-card">
                                        <h6>Cara Menghitung Kebutuhan Kalori Harian dengan Tepat</h6>
                                        <p class="article-excerpt">Pelajari cara menghitung kebutuhan kalori Anda berdasarkan usia, berat badan, tinggi badan, dan tingkat aktivitas...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><i class="bi bi-clock"></i> 2 hari lalu</small>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Baca</a>
                                        </div>
                                    </div>

                                    <!-- Artikel 2 -->
                                    <div class="article-card">
                                        <h6>5 Olahraga Terbaik untuk Turun Berat Badan dengan Cepat</h6>
                                        <p class="article-excerpt">Temukan olahraga paling efektif untuk membakar lemak dan mencapai target berat badan ideal dalam waktu singkat...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><i class="bi bi-clock"></i> 5 hari lalu</small>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Baca</a>
                                        </div>
                                    </div>

                                    <!-- Artikel 3 -->
                                    <div class="article-card">
                                        <h6>10 Resep Sarapan Sehat Rendah Kalori untuk Diet</h6>
                                        <p class="article-excerpt">Kumpulan resep sarapan sehat yang mudah dibuat, rendah kalori, dan tinggi protein untuk memulai hari dengan energi...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><i class="bi bi-clock"></i> 1 minggu lalu</small>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Baca</a>
                                        </div>
                                    </div>

                                    <!-- Artikel 4 -->
                                    <div class="article-card">
                                        <h6>Mengatasi Emotional Eating: Strategi Ampuh Saat Diet</h6>
                                        <p class="article-excerpt">Strategi efektif untuk mengatasi kebiasaan makan emosional dan tetap konsisten dengan program diet Anda...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><i class="bi bi-clock"></i> 2 minggu lalu</small>
                                            <a href="#" class="btn btn-outline-primary btn-sm">Baca</a>
                                        </div>
                                    </div>

                                    <div class="text-center mt-3">
                                        <a href="#" class="btn-premium">
                                            <i class="bi bi-arrow-right"></i> Lihat Semua Artikel
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Stats -->
                            <div class="card-premium">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">
                                        <i class="bi bi-speedometer2 me-2"></i> Statistik Cepat
                                    </h5>
                                    <div class="row text-center">
                                        <div class="col-6 mb-3">
                                            <div class="stats-card">
                                                <i class="bi bi-cup"></i>
                                                <h5 id="publicMenuCount">{{ $userRecipes->where('visibility', 'public')->count() }}</h5>
                                                <small>Menu Public</small>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="stats-card">
                                                <i class="bi bi-shield-lock"></i>
                                                <h5 id="privateMenuCount">{{ $userRecipes->where('visibility', 'private')->count() }}</h5>
                                                <small>Menu Private</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats-card">
                                                <i class="bi bi-check-circle"></i>
                                                <h5 id="streakDays">{{ $progress['streak_days'] ?? 0 }}</h5>
                                                <small>Hari Konsisten</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stats-card">
                                                <i class="bi bi-calendar3"></i>
                                                <h5 id="daysLeft">{{ $progress['estimated_completion'] ?? 30 }}</h5>
                                                <small>Hari Tersisa</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==================== MODALS ==================== -->

    <!-- Refresh Modal untuk Starter -->
    <div class="modal fade" id="refreshModalStarter" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Refresh Daily Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Anda akan menggunakan 1 dari <span id="remainingRefreshStarter">3</span> kesempatan refresh hari ini.</p>
                    <p class="text-muted small">Refresh akan direset setiap hari pukul 00:00.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmRefreshStarter">Ya, Refresh</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Activity Modal -->
    <div class="modal fade" id="addActivityModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Aktivitas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="activityForm">
                        <div class="mb-3">
                            <label class="form-label">Aktivitas</label>
                            <input type="text" class="form-control" id="activityName" placeholder="Contoh: Minum air 500ml" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Waktu</label>
                            <input type="time" class="form-control" id="activityTime" value="{{ date('H:i') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kalori (Opsional)</label>
                            <input type="number" class="form-control" id="activityCalories" placeholder="Contoh: 150 (kosongkan jika 0)">
                            <small class="text-muted">Gunakan tanda minus (-) untuk kalori yang dibakar</small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="addActivity()">Tambah</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Modal untuk Starter -->
    <div class="modal fade" id="profileModalStarter" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person me-2"></i> Profil Saya
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="user-avatar mx-auto mb-3" style="width: 80px; height: 80px; font-size: 1.5rem;">
                            {{ substr($user->nickname, 0, 2) }}
                        </div>
                        <h4>{{ $user->nickname }}</h4>
                        <p class="text-muted">{{ $user->email ?? 'user@example.com' }}</p>
                        <span class="premium-badge">
                            <i class="bi bi-star-fill me-1"></i>STARTER
                        </span>
                    </div>

                    <div class="row text-center">
                        <div class="col-6">
                            <h5 class="fw-bold">{{ $user->current_weight ?? '0' }} kg</h5>
                            <small class="text-muted">Berat Sekarang</small>
                        </div>
                        <div class="col-6">
                            <h5 class="fw-bold">{{ $user->target_weight ?? '0' }} kg</h5>
                            <small class="text-muted">Target Berat</small>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h6>Info Akun</h6>
                        <p><strong>Member sejak:</strong> {{ $user->created_at->format('d M Y') ?? 'Jan 2024' }}</p>
                        <p><strong>Paket:</strong> EatJoy Starter</p>
                        <p><strong>Berlaku hingga:</strong> {{ now()->addDays(30)->format('d M Y') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Settings Modal untuk Starter -->
    <div class="modal fade settings-modal" id="settingsModalStarter" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-gear me-2"></i> Pengaturan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="settings-item">
                        <label>Notifikasi Email</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="settings-item">
                        <label>Notifikasi Aplikasi</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="settings-item">
                        <label>Tampilkan Kalori</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="settings-item">
                        <label>Mode Gelap</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox">
                        </div>
                    </div>
                    <div class="settings-item">
                        <label>Bahasa</label>
                        <select class="form-select form-select-sm" style="width: 120px;">
                            <option selected>Indonesia</option>
                            <option>English</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="saveSettingsStarter()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recipe Modal dengan Gambar -->
    <div class="modal fade" id="recipeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="recipeModalTitle">Detail Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="recipeModalBody">
                    <!-- Recipe details will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ==================== GLOBAL VARIABLES ====================
        let weightData = {
            dates: JSON.parse('{!! json_encode($weightHistory["dates"] ?? []) !!}'),
            weights: JSON.parse('{!! json_encode($weightHistory["weights"] ?? []) !!}'),
            initialWeight: {{ $user->initial_weight ?? $user->current_weight }},
            targetWeight: {{ $user->target_weight }}
        };

        // Data resep (24 menu - 8, 8, 8)
        const recipes = [
            {
                id: 1,
                title: "Dada Ayam Bakar Lemon Herbs",
                description: "Dada ayam tanpa kulit yang dipanggang dengan bumbu lemon dan rempah yang disajikan dengan buncis rebus",
                calories: 280,
                time: "15 menit",
                image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["150 gram dada ayam fillet", "1 sdt minyak zaitun", "1/2 buah lemon (peras)", "oregano", "garam", "lada hitam", "50 gram buncis"],
                steps: ["Lumuri dada ayam dengan air lemon, minyak zaitun, oregano, garam, dan lada. Lalu diamkan selama 15 menit", "Panaskan teflon, lalu panggang ayam hingga matang kecoklatan di kedua sisi", "Rebus buncis sebentar dan sajikan"]
            },
            {
                id: 2,
                title: "Oatmeal Buah Beri",
                description: "Oatmeal dengan buah berry dan madu sebagai pemanis alami",
                calories: 280,
                time: "10 menit",
                image: "https://images.unsplash.com/photo-1505253668822-42074d58a7c6?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["50g oatmeal", "100ml susu almond", "50g mixed berries", "1 sdt madu", "10g kacang almond"],
                steps: ["Masak oatmeal dengan susu", "Tambahkan buah beri", "Beri madu", "Taburi kacang almond"]
            },
            {
                id: 3,
                title: "Ikan Bakar Lemon",
                description: "Ikan kakap bakar dengan perasan lemon segar",
                calories: 350,
                time: "25 menit",
                image: "https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g ikan kakap", "1 buah lemon", "2 siung bawang putih", "1 sdt minyak zaitun", "Garam dan merica"],
                steps: ["Marinasi ikan dengan lemon", "Panggang di oven 200°C", "Bakar hingga kecoklatan", "Sajikan dengan lemon"]
            },
            {
                id: 4,
                title: "Smoothie Green",
                description: "Smoothie sayuran hijau dengan buah untuk rasa yang enak",
                calories: 220,
                time: "5 menit",
                image: "https://images.unsplash.com/photo-1502741224143-90386d7f8c82?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["1 buah pisang", "100g bayam", "150ml susu almond", "1 sdt madu", "Es batu secukupnya"],
                steps: ["Blender semua bahan", "Tambahkan es batu", "Blender hingga halus", "Sajikan segera"]
            },
            {
                id: 5,
                title: "Quinoa Bowl",
                description: "Quinoa dengan sayuran kukus dan dressing lemon",
                calories: 380,
                time: "20 menit",
                image: "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["100g quinoa", "50g brokoli", "50g wortel", "50g jagung", "Dressing lemon"],
                steps: ["Masak quinoa", "Kukus sayuran", "Campur quinoa dan sayuran", "Tuang dressing"]
            },
            {
                id: 6,
                title: "Tumis Tahu Brokoli",
                description: "Tahu dan brokoli tumis saus tiram rendah sodium",
                calories: 300,
                time: "18 menit",
                image: "https://images.unsplash.com/photo-1546069901-d5bfd2cbfb1f?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g tahu", "150g brokoli", "2 siung bawang putih", "1 sdm saus tiram rendah sodium", "1 sdt minyak wijen"],
                steps: ["Tumis bawang putih", "Masukkan brokoli", "Tambahkan tahu", "Beri saus tiram"]
            },
            {
                id: 7,
                title: "Sup Ayam Jamur",
                description: "Sup ayam dengan jamur shiitake dan sayuran",
                calories: 250,
                time: "30 menit",
                image: "https://images.unsplash.com/photo-1547592166-23ac45744acd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["150g dada ayam", "100g jamur shiitake", "50g wortel", "50g daun bawang", "1 liter kaldu ayam"],
                steps: ["Rebus ayam hingga matang", "Tambahkan jamur dan wortel", "Masak hingga sayuran empuk", "Taburi daun bawang"]
            },
            {
                id: 8,
                title: "Avocado Toast",
                description: "Roti panggang dengan alpukat dan telur rebus",
                calories: 320,
                time: "10 menit",
                image: "https://images.unsplash.com/photo-1525351484163-7529414344d8?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["2 lembar roti gandum", "1 buah alpukat", "1 butir telur rebus", "Lemon juice", "Garam dan merica"],
                steps: ["Panggang roti", "Hancurkan alpukat", "Oleskan pada roti", "Tambahkan telur rebus"]
            },
            // Halaman 2
            {
                id: 9,
                title: "Greek Yogurt Bowl",
                description: "Yogurt Greek dengan granola dan buah segar",
                calories: 280,
                time: "5 menit",
                image: "https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g yogurt Greek", "30g granola rendah gula", "50g buah berry", "1 sdt madu", "10g chia seed"],
                steps: ["Tuang yogurt ke mangkuk", "Tambahkan granola", "Beri buah berry", "Taburi chia seed"]
            },
            {
                id: 10,
                title: "Salmon Panggang",
                description: "Salmon panggang dengan asparagus dan lemon",
                calories: 400,
                time: "25 menit",
                image: "https://images.unsplash.com/photo-1467003909585-2f8a72700288?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g salmon fillet", "150g asparagus", "1 buah lemon", "1 sdt minyak zaitun", "Herbs segar"],
                steps: ["Marinasi salmon", "Panggang bersama asparagus", "Peras lemon", "Taburi herbs segar"]
            },
            {
                id: 11,
                title: "Tuna Salad Wrap",
                description: "Wrap dengan tuna salad dan sayuran segar",
                calories: 350,
                time: "15 menit",
                image: "https://images.unsplash.com/photo-1511690656952-34342bb7c2f2?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["1 tortilla gandum", "150g tuna kaleng", "50g selada", "30g tomat", "2 sdm mayonnaise rendah lemak"],
                steps: ["Campur tuna dengan mayo", "Taruh di tortilla", "Tambahkan sayuran", "Gulung dan sajikan"]
            },
            {
                id: 12,
                title: "Chicken Stir Fry",
                description: "Tumis ayam dengan paprika dan bawang bombay",
                calories: 380,
                time: "20 menit",
                image: "https://images.unsplash.com/photo-1562967914-608f82629710?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g dada ayam", "100g paprika", "50g bawang bombay", "2 siung bawang putih", "Saus stir fry rendah sodium"],
                steps: ["Tumis bawang putih", "Masukkan ayam", "Tambahkan paprika", "Beri saus"]
            },
            {
                id: 13,
                title: "Egg White Omelette",
                description: "Omelette putih telur dengan jamur dan bayam",
                calories: 220,
                time: "12 menit",
                image: "https://images.unsplash.com/photo-1556909211-36987daf7b4d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["3 putih telur", "50g jamur", "50g bayam", "1 sdt minyak zaitun", "Garam dan merica"],
                steps: ["Kocok putih telur", "Tumis jamur dan bayam", "Tuang telur", "Masak hingga matang"]
            },
            {
                id: 14,
                title: "Vegetable Soup",
                description: "Sup sayuran rendah kalori dengan kaldu ayam",
                calories: 180,
                time: "35 menit",
                image: "https://images.unsplash.com/photo-1547592166-23ac45744acd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["100g wortel", "100g kentang", "50g jagung", "50g buncis", "1 liter kaldu sayur"],
                steps: ["Potong semua sayuran", "Rebus dalam kaldu", "Masak hingga empuk", "Sajikan hangat"]
            },
            {
                id: 15,
                title: "Protein Pancake",
                description: "Pancake protein tinggi dengan buah berry",
                calories: 320,
                time: "15 menit",
                image: "https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["50g tepung protein", "1 butir telur", "100ml susu almond", "50g buah berry", "1 sdt madu"],
                steps: ["Campur bahan pancake", "Masak di teflon", "Tumpuk pancake", "Hiasi dengan buah"]
            },
            {
                id: 16,
                title: "Zucchini Noodles",
                description: "Mie zucchini dengan saus tomat dan daging cincang",
                calories: 280,
                time: "25 menit",
                image: "https://images.unsplash.com/photo-1598214886806-c87b84b7078b?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["2 buah zucchini", "150g daging cincang", "200g saus tomat rendah gula", "Bawang putih", "Keju parmesan"],
                steps: ["Buat zucchini noodles", "Tumis daging cincang", "Tambahkan saus tomat", "Campur dengan noodles"]
            },
            // Halaman 3
            {
                id: 17,
                title: "Chickpea Salad",
                description: "Salad chickpea dengan ketimun dan tomat",
                calories: 260,
                time: "10 menit",
                image: "https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g chickpea kaleng", "100g ketimun", "100g tomat", "50g bawang merah", "Dressing lemon"],
                steps: ["Cuci chickpea", "Potong sayuran", "Campur semua bahan", "Tuang dressing"]
            },
            {
                id: 18,
                title: "Turkey Sandwich",
                description: "Sandwich turkey dengan sayuran segar",
                calories: 340,
                time: "10 menit",
                image: "https://images.unsplash.com/photo-1481070555726-e2fe8357725c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["2 lembar roti gandum", "100g turkey slice", "50g selada", "30g tomat", "1 sdm mustard"],
                steps: ["Oles mustard pada roti", "Taruh turkey slice", "Tambahkan sayuran", "Tutup dengan roti"]
            },
            {
                id: 19,
                title: "Fruit Salad",
                description: "Salad buah segar dengan dressing yogurt",
                calories: 200,
                time: "10 menit",
                image: "https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["100g apel", "100g pir", "100g anggur", "100g jeruk", "100g yogurt rendah lemak"],
                steps: ["Potong semua buah", "Campur dalam mangkuk", "Tuang yogurt", "Aduk rata"]
            },
            {
                id: 20,
                title: "Beef Stir Fry",
                description: "Tumis daging sapi dengan brokoli dan jamur",
                calories: 420,
                time: "25 menit",
                image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["200g daging sapi", "150g brokoli", "100g jamur", "Bawang putih", "Saus stir fry"],
                steps: ["Tumis bawang putih", "Masak daging sapi", "Tambahkan sayuran", "Beri saus"]
            },
            {
                id: 21,
                title: "Egg Salad",
                description: "Salad telur dengan mayonnaise rendah lemak",
                calories: 280,
                time: "15 menit",
                image: "https://images.unsplash.com/photo-1517067674945-26f5f9fd40c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["3 butir telur rebus", "2 sdm mayonnaise rendah lemak", "1 sdt mustard", "Garam dan merica", "Paprika"],
                steps: ["Potong telur rebus", "Campur dengan mayonnaise", "Bumbui", "Taburi paprika"]
            },
            {
                id: 22,
                title: "Vegetable Curry",
                description: "Kari sayuran dengan santan rendah lemak",
                calories: 350,
                time: "30 menit",
                image: "https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["100g kentang", "100g wortel", "100g kacang panjang", "200ml santan rendah lemak", "Bumbu kari"],
                steps: ["Tumis bumbu kari", "Masukkan sayuran", "Tuang santan", "Masak hingga matang"]
            },
            {
                id: 23,
                title: "Chicken Soup",
                description: "Sup ayam dengan sayuran dan mie shirataki",
                calories: 290,
                time: "35 menit",
                image: "https://images.unsplash.com/photo-1547592166-23ac45744acd?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["150g dada ayam", "100g mie shirataki", "50g wortel", "50g daun bawang", "Kaldu ayam"],
                steps: ["Rebus ayam", "Tambahkan mie shirataki", "Masukkan sayuran", "Masak hingga matang"]
            },
            {
                id: 24,
                title: "Berry Smoothie Bowl",
                description: "Smoothie bowl buah berry dengan topping sehat",
                calories: 240,
                time: "8 menit",
                image: "https://images.unsplash.com/photo-1505252585461-04db1eb84625?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80",
                ingredients: ["100g mixed berries", "1 buah pisang", "150ml susu almond", "Topping: granola, chia seed, kelapa"],
                steps: ["Blender buah dan susu", "Tuang ke mangkuk", "Beri topping", "Sajikan segera"]
            }
        ];

        // Pagination untuk resep - 8, 8, 8
        let currentPage = 1;
        const recipesPerPage = 8;

        // Daily Planner Variables
        let plannerTasks = [];
        let dailyProgressChart = null;

        // Admin default tasks (5 TASK - TIDAK BISA DIHAPUS)
        const adminDefaultTasks = [
            { id: 1, task: "Sarapan sehat", time: "07:00", calories: 350, completed: false, type: "admin" },
            { id: 2, task: "Minum air 500ml", time: "08:00", calories: 0, completed: false, type: "admin" },
            { id: 3, task: "Olahraga ringan", time: "09:00", calories: -200, completed: false, type: "admin" },
            { id: 4, task: "Makan siang sehat", time: "12:00", calories: 450, completed: false, type: "admin" },
            { id: 5, task: "Snack sore sehat", time: "16:00", calories: 150, completed: false, type: "admin" }
        ];

        // Daily Menu templates untuk refresh (STARTER)
        const dailyMenusStarter = [
            { name: "Oatmeal Buah Beri", calories: 280, time: "10 menit" },
            { name: "Ayam Bakar Lemon", calories: 320, time: "18 menit" },
            { name: "Salad Sayur Segar", calories: 250, time: "15 menit" },
            { name: "Smoothie Pisang", calories: 220, time: "5 menit" },
            { name: "Tumis Tahu Brokoli", calories: 280, time: "15 menit" },
            { name: "Sup Ayam Jamur", calories: 300, time: "25 menit" }
        ];

        // ==================== DOCUMENT READY ====================
        document.addEventListener('DOMContentLoaded', function() {
            initWeightChart();
            initDailyPlanner();
            loadRecipes();

            // Weight form submission
            document.getElementById('weightForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const weight = parseFloat(document.getElementById('weightInput').value);
                const date = document.getElementById('weightDate').value;

                if (weight < 30 || weight > 300) {
                    alert('Berat badan harus antara 30-300 kg');
                    return;
                }

                weightData.dates.push(date);
                weightData.weights.push(weight);

                const weightLost = weightData.initialWeight - weight;
                const targetWeightLoss = weightData.initialWeight - weightData.targetWeight;
                const progressPercentage = Math.min(Math.round((weightLost / targetWeightLoss) * 100), 100);

                document.getElementById('weightDifference').textContent = weightLost.toFixed(1);
                document.getElementById('currentProgress').textContent = progressPercentage;

                updateWeightChart();
                saveWeightData(weight, date);

                showToast('✅ Berat badan berhasil diperbarui! Progress: ' + progressPercentage + '%', 'success');

                this.reset();
                document.getElementById('weightDate').value = new Date().toISOString().split('T')[0];
            });

            // Refresh Menu Button untuk Starter
            const refreshButtonStarter = document.querySelector('.refresh-menu-starter');
            const refreshModalStarter = new bootstrap.Modal(document.getElementById('refreshModalStarter'));

            if (refreshButtonStarter) {
                refreshButtonStarter.addEventListener('click', function() {
                    const refreshLeft = parseInt(this.dataset.refreshLeft);

                    if (refreshLeft <= 0) {
                        showToast('⏰ Batas refresh harian telah habis! Coba lagi besok.', 'warning');
                        return;
                    }

                    document.getElementById('remainingRefreshStarter').textContent = refreshLeft;
                    refreshModalStarter.show();

                    document.getElementById('confirmRefreshStarter').onclick = function() {
                        refreshModalStarter.hide();

                        // Update menu harian
                        const randomMenu = dailyMenusStarter[Math.floor(Math.random() * dailyMenusStarter.length)];
                        document.getElementById('dailyMenuNameStarter').textContent = randomMenu.name;
                        document.getElementById('dailyMenuCaloriesStarter').textContent = randomMenu.calories;
                        document.getElementById('dailyMenuTimeStarter').textContent = randomMenu.time;

                        // Update refresh count
                        const newRefreshCount = refreshLeft - 1;
                        refreshButtonStarter.dataset.refreshLeft = newRefreshCount;

                        setTimeout(() => {
                            showToast('✅ Menu berhasil di-refresh!', 'success');

                            if (newRefreshCount > 0) {
                                refreshButtonStarter.innerHTML = `
                                    <i class="bi bi-arrow-clockwise"></i>
                                    Refresh Menu (${newRefreshCount}x tersisa)
                                `;
                            } else {
                                refreshButtonStarter.innerHTML = `
                                    <i class="bi bi-arrow-clockwise"></i>
                                    Refresh Habis - Coba Besok
                                `;
                                refreshButtonStarter.classList.add('disabled');
                            }
                        }, 1000);
                    };
                });
            }
        });

        // ==================== WEIGHT CHART FUNCTIONS ====================
        function initWeightChart() {
            const ctx = document.getElementById('weightChart').getContext('2d');

            if (weightData.dates.length === 0) {
                const today = new Date();
                weightData.dates = [today.toISOString().split('T')[0]];
                weightData.weights = [weightData.initialWeight];
            }

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: weightData.dates,
                    datasets: [{
                        label: 'Berat Badan (kg)',
                        data: weightData.weights,
                        borderColor: '#4CAF50',
                        backgroundColor: 'rgba(76, 175, 80, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true
                    }, {
                        label: 'Target',
                        data: Array(weightData.dates.length).fill(weightData.targetWeight),
                        borderColor: '#FF9800',
                        borderWidth: 2,
                        borderDash: [5, 5],
                        tension: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed.y.toFixed(1) + ' kg';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            title: { display: true, text: 'Berat Badan (kg)' }
                        },
                        x: {
                            title: { display: true, text: 'Tanggal' },
                            ticks: { maxRotation: 45, minRotation: 45 }
                        }
                    }
                }
            });
        }

        // ==================== DAILY PLANNER FUNCTIONS - FIXED ====================
        function initDailyPlanner() {
            // Load tasks from localStorage
            const savedTasks = localStorage.getItem('dailyPlannerTasks');
            if (savedTasks) {
                plannerTasks = JSON.parse(savedTasks);
            } else {
                // Jika tidak ada data, gunakan admin tasks sebagai default
                plannerTasks = [...adminDefaultTasks];
                saveTasksToLocalStorage();
            }

            renderPlannerTasks();
            initDailyProgressChart();
            updateDailyProgress();
        }

        function renderPlannerTasks() {
            const container = document.getElementById('plannerTasks');
            container.innerHTML = '';

            plannerTasks.forEach(task => {
                const taskElement = document.createElement('div');
                taskElement.className = `planner-task ${task.completed ? 'completed' : ''} ${task.type === 'admin' ? 'admin-task' : 'user-task'}`;
                taskElement.dataset.taskId = task.id;
                taskElement.dataset.calories = task.calories;

                let deleteButton = '';
                // Hanya user tasks yang bisa dihapus
                if (task.type === 'user') {
                    deleteButton = `<button class="delete-btn" onclick="removeTask(${task.id})">×</button>`;
                }

                const badge = `<span class="task-badge ${task.type === 'admin' ? 'admin-badge' : 'user-badge'}">${task.type === 'admin' ? 'Admin' : 'User'}</span>`;

                taskElement.innerHTML = `
                    ${badge}
                    ${deleteButton}
                    <div class="form-check">
                        <input class="form-check-input planner-checkbox"
                               type="checkbox"
                               ${task.completed ? 'checked' : ''}
                               data-task-id="${task.id}">
                        <label class="form-check-label" style="padding-left: 30px;">
                            <strong>${task.task}</strong>
                            <small class="text-muted d-block">${task.time}</small>
                            ${task.calories !== 0 ? `
                            <small class="${task.calories > 0 ? 'text-danger' : 'text-success'}">
                                <i class="bi bi-fire ms-1"></i>
                                ${task.calories > 0 ? '+' : ''}${task.calories} cal
                            </small>
                            ` : ''}
                        </label>
                    </div>
                `;

                container.appendChild(taskElement);
            });

            // Add event listeners to checkboxes
            container.querySelectorAll('.planner-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const taskId = parseInt(this.dataset.taskId);
                    const task = plannerTasks.find(t => t.id === taskId);

                    if (task) {
                        task.completed = this.checked;
                        saveTasksToLocalStorage();
                        updateDailyProgress();
                    }
                });
            });
        }

        function initDailyProgressChart() {
            const ctx = document.getElementById('dailyProgressCircle').getContext('2d');

            dailyProgressChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Selesai', 'Belum'],
                    datasets: [{
                        data: [0, 100],
                        backgroundColor: ['#4CAF50', '#e0e0e0'],
                        borderWidth: 0,
                        cutout: '70%'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: { enabled: false }
                    },
                    cutout: '70%'
                }
            });
        }

        function updateDailyProgress() {
            const completedTasks = plannerTasks.filter(task => task.completed).length;
            const totalTasks = plannerTasks.length;
            const progressPercentage = totalTasks > 0 ? Math.round((completedTasks / totalTasks) * 100) : 0;

            // Count admin vs user tasks
            const adminTasks = plannerTasks.filter(task => task.type === 'admin').length;
            const userTasks = plannerTasks.filter(task => task.type === 'user').length;

            // Update badge
            document.getElementById('progressBadge').textContent = `${completedTasks}/${totalTasks} selesai`;

            // Update progress text
            document.getElementById('progressText').textContent = `${completedTasks} dari ${totalTasks} aktivitas selesai`;

            // Update percentage text
            document.getElementById('progressPercentage').textContent = `${progressPercentage}%`;

            // Update task counts
            document.getElementById('adminTasksCount').textContent = adminTasks;
            document.getElementById('userTasksCount').textContent = userTasks;

            // Update progress bar
            document.getElementById('dailyProgressBar').style.width = `${progressPercentage}%`;

            // Update chart
            if (dailyProgressChart) {
                dailyProgressChart.data.datasets[0].data = [progressPercentage, 100 - progressPercentage];
                dailyProgressChart.update();
            }
        }

        function addActivity() {
            const name = document.getElementById('activityName').value.trim();
            const time = document.getElementById('activityTime').value;
            const calories = parseInt(document.getElementById('activityCalories').value) || 0;

            if (!name || !time) {
                showToast('❌ Harap isi nama dan waktu aktivitas', 'error');
                return;
            }

            const newTask = {
                id: Date.now(),
                task: name,
                time: time,
                calories: calories,
                completed: false,
                type: "user"
            };

            plannerTasks.push(newTask);
            saveTasksToLocalStorage();
            renderPlannerTasks();
            updateDailyProgress();

            const modal = bootstrap.Modal.getInstance(document.getElementById('addActivityModal'));
            modal.hide();

            document.getElementById('activityForm').reset();
            document.getElementById('activityTime').value = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});

            showToast('✅ Aktivitas berhasil ditambahkan!', 'success');
        }

        function removeTask(taskId) {
            // Hanya user tasks yang bisa dihapus
            const taskToRemove = plannerTasks.find(task => task.id === taskId);
            if (!taskToRemove || taskToRemove.type !== 'user') {
                showToast('❌ Hanya aktivitas buatan Anda sendiri yang bisa dihapus', 'error');
                return;
            }

            plannerTasks = plannerTasks.filter(task => task.id !== taskId);
            saveTasksToLocalStorage();
            renderPlannerTasks();
            updateDailyProgress();

            showToast('🗑️ Aktivitas berhasil dihapus!', 'info');
        }

        function saveTasksToLocalStorage() {
            localStorage.setItem('dailyPlannerTasks', JSON.stringify(plannerTasks));
        }

        // ==================== RECIPE FUNCTIONS ====================
        function loadRecipes(page = 1) {
            currentPage = page;
            const start = (page - 1) * recipesPerPage;
            const end = start + recipesPerPage;
            const pageRecipes = recipes.slice(start, end);

            const recipeGrid = document.getElementById('recipeGrid');
            recipeGrid.innerHTML = '';

            pageRecipes.forEach(recipe => {
                const recipeCard = document.createElement('div');
                recipeCard.className = 'recipe-card';
                recipeCard.innerHTML = `
                    <h6 class="fw-bold mb-2">${recipe.title}</h6>
                    <p class="text-muted small mb-2">${recipe.description}</p>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">
                            <i class="bi bi-fire"></i> ${recipe.calories} cal
                        </small>
                        <small class="text-muted">
                            <i class="bi bi-clock"></i> ${recipe.time}
                        </small>
                    </div>
                    <button class="btn btn-outline-primary btn-sm w-100 view-recipe-btn"
                            data-recipe-id="${recipe.id}">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </button>
                `;
                recipeGrid.appendChild(recipeCard);
            });

            document.querySelectorAll('.view-recipe-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const recipeId = parseInt(this.dataset.recipeId);
                    const recipe = recipes.find(r => r.id === recipeId);
                    showRecipeModal(recipe);
                });
            });

            updatePagination();
        }

        function updatePagination() {
            const totalPages = Math.ceil(recipes.length / recipesPerPage);
            const pagination = document.getElementById('recipePagination');
            pagination.innerHTML = '';

            document.getElementById('recipePageInfo').textContent = `${currentPage}/${totalPages}`;

            // Previous button
            const prevLi = document.createElement('li');
            prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
            prevLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipes(${currentPage - 1})">&laquo; Prev</a>`;
            pagination.appendChild(prevLi);

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                const pageLi = document.createElement('li');
                pageLi.className = `page-item ${i === currentPage ? 'active' : ''}`;
                pageLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipes(${i})">${i}</a>`;
                pagination.appendChild(pageLi);
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
            nextLi.innerHTML = `<a class="page-link" href="#" onclick="loadRecipes(${currentPage + 1})">Next &raquo;</a>`;
            pagination.appendChild(nextLi);
        }

        function showRecipeModal(recipe) {
            const modal = new bootstrap.Modal(document.getElementById('recipeModal'));
            document.getElementById('recipeModalTitle').textContent = recipe.title;

            document.getElementById('recipeModalBody').innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <img src="${recipe.image}" alt="${recipe.title}" class="recipe-modal-img">
                        <div class="mt-3">
                            <p><strong>Deskripsi:</strong> ${recipe.description}</p>
                            <div class="row">
                                <div class="col-6">
                                    <p><i class="bi bi-fire text-primary"></i> <strong>Kalori:</strong> ${recipe.calories} cal</p>
                                </div>
                                <div class="col-6">
                                    <p><i class="bi bi-clock text-primary"></i> <strong>Waktu:</strong> ${recipe.time}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6><strong>Bahan-bahan:</strong></h6>
                        <ul>
                            ${recipe.ingredients.map(ing => `<li>${ing}</li>`).join('')}
                        </ul>

                        <h6 class="mt-4"><strong>Cara Membuat:</strong></h6>
                        <ol>
                            ${recipe.steps.map((step, index) => `<li>${step}</li>`).join('')}
                        </ol>

                        <div class="alert alert-success mt-3">
                            <i class="bi bi-check-circle"></i>
                            <strong>Tips Premium:</strong> Menu ini cocok untuk sarapan karena rendah kalori dan tinggi protein.
                        </div>
                    </div>
                </div>
            `;

            modal.show();
        }

        // ==================== SETTINGS FUNCTIONS ====================
        function saveSettingsStarter() {
            showToast('✅ Pengaturan berhasil disimpan!', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('settingsModalStarter'));
            modal.hide();
        }

        // ==================== UTILITY FUNCTIONS ====================
        function saveWeightData(weight, date) {
            // Simulate API call
            console.log('Saving weight data:', { weight, date });
        }

        function showToast(message, type = 'info') {
            const toastContainer = document.getElementById('toastContainer') || createToastContainer();
            const toastId = 'toast-' + Date.now();

            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-bg-${type === 'success' ? 'success' : type === 'warning' ? 'warning' : type === 'error' ? 'danger' : 'info'} border-0`;
            toast.id = toastId;
            toast.setAttribute('role', 'alert');
            toast.setAttribute('aria-live', 'assertive');
            toast.setAttribute('aria-atomic', 'true');

            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;

            toastContainer.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast, { delay: 3000 });
            bsToast.show();

            toast.addEventListener('hidden.bs.toast', function() {
                toast.remove();
            });
        }

        function createToastContainer() {
            const container = document.createElement('div');
            container.id = 'toastContainer';
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(container);
            return container;
        }

        function scrollToSection(sectionId) {
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function updateWeightChart() {
            // Reinitialize chart with new data
            initWeightChart();
        }
    </script>
</body>
</html>
