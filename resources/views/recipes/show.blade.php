<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recipe->title }} | EatJoy Premium+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #9C27B0;
            --secondary: #673AB7;
            --accent: #00BCD4;
            --light: #F3E5F5;
            --dark: #4A148C;
            --gradient: linear-gradient(135deg, #9C27B0, #673AB7);
            --gradient-accent: linear-gradient(135deg, #00BCD4, #0097A7);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #f3e5f5 100%);
            min-height: 100vh;
        }

        .premium-nav {
            background: white;
            box-shadow: 0 4px 20px rgba(156, 39, 176, 0.15);
            border-bottom: 3px solid var(--primary);
        }

        .premium-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(156, 39, 176, 0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            border-top: 5px solid var(--primary);
            background: white;
            position: relative;
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(156, 39, 176, 0.2);
        }

        .premium-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }

        .premium-header {
            background: var(--gradient);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        .premium-header::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .premium-badge {
            background: var(--gradient);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(156, 39, 176, 0.3);
        }

        .ai-badge {
            background: var(--gradient-accent);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0, 188, 212, 0.3);
        }

        .btn-premium {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 15px;
            font-weight: 500;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn-premium:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.3);
            color: white;
        }

        .btn-ai {
            background: var(--gradient-accent);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 15px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-ai:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 188, 212, 0.3);
            color: white;
        }

        .recipe-hero {
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .recipe-hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recipe-hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        }

        .hero-content {
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
            color: white;
            z-index: 2;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            margin: 25px 0;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 1px solid #F3E5F5;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.1);
            border-color: var(--primary);
        }

        .stat-card i {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .stat-card.ai i {
            color: var(--accent);
        }

        .stat-card .value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .stat-card .label {
            font-size: 0.85rem;
            color: #666;
        }

        .ingredient-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 5px solid var(--primary);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }

        .ingredient-card:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.1);
        }

        .step-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            position: relative;
            border: 1px solid #F3E5F5;
            transition: all 0.3s;
        }

        .step-card:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.1);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: -15px;
            width: 50px;
            height: 50px;
            background: var(--gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.3);
        }

        .ai-insight {
            background: linear-gradient(135deg, #E0F7FA, #B2EBF2);
            border-radius: 15px;
            padding: 20px;
            border-left: 5px solid var(--accent);
            margin: 25px 0;
            position: relative;
            overflow: hidden;
        }

        .ai-insight::before {
            content: '🤖';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            opacity: 0.2;
        }

        .floating-actions {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 1000;
        }

        .floating-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            transition: all 0.3s;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .floating-btn.edit {
            background: var(--gradient);
        }

        .floating-btn.delete {
            background: linear-gradient(135deg, #F44336, #D32F2F);
        }

        .floating-btn.back {
            background: linear-gradient(135deg, #607D8B, #455A64);
        }

        .floating-btn:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        .nutrition-facts {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .nutrition-facts::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }

        .progress-ring {
            width: 120px;
            height: 120px;
            margin: 0 auto;
        }

        .premium-feature-tag {
            display: inline-block;
            background: rgba(156, 39, 176, 0.1);
            color: var(--primary);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid rgba(156, 39, 176, 0.2);
            transition: all 0.3s;
        }

        .premium-feature-tag:hover {
            background: rgba(156, 39, 176, 0.2);
            transform: translateY(-2px);
        }

        .feature-tag-ai {
            background: rgba(0, 188, 212, 0.1);
            color: #0097A7;
            border: 1px solid rgba(0, 188, 212, 0.2);
        }

        .share-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .share-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
            border: none;
        }

        .share-btn.facebook { background: #3b5998; }
        .share-btn.twitter { background: #1da1f2; }
        .share-btn.whatsapp { background: #25d366; }
        .share-btn.copy { background: #607d8b; }

        .share-btn:hover {
            transform: translateY(-3px) rotate(10deg);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .author-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: 2px solid #F3E5F5;
            transition: all 0.3s;
        }

        .author-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            background: var(--gradient);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(156, 39, 176, 0.3);
        }

        .ai-recommendation {
            background: linear-gradient(135deg, #FFF8E1, #FFECB3);
            border-radius: 15px;
            padding: 20px;
            margin: 25px 0;
            border-left: 5px solid #FF9800;
            position: relative;
        }

        .ai-recommendation::before {
            content: '⭐';
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg premium-nav py-3">
        <div class="container">
            <div class="d-flex align-items-center">
                <a class="navbar-brand fw-bold text-dark" href="{{ route('dashboard.premium.starter.plus') }}">
                    <i class="bi bi-egg-fried me-2" style="color: var(--primary);"></i>EatJoy
                </a>
                <span class="premium-badge ms-2">
                    <i class="bi bi-stars me-1"></i>STARTER+
                </span>
            </div>

            <div class="d-flex align-items-center">
                <!-- Premium Features Indicator -->
                <div class="me-4 d-none d-md-block">
                    <div class="d-flex gap-2">
                        <span class="badge bg-light text-dark border">
                            <i class="bi bi-infinity me-1"></i>Unlimited
                        </span>
                        <span class="badge bg-light text-dark border">
                            <i class="bi bi-robot me-1"></i>AI Access
                        </span>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <div class="user-avatar me-2" style="width: 40px; height: 40px; background: var(--gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                            {{ substr(Auth::user()->nickname, 0, 2) }}
                        </div>
                        <div class="text-start">
                            <div class="fw-bold">{{ Auth::user()->nickname }}</div>
                            <small class="text-muted">Premium+ Member</small>
                        </div>
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('dashboard.premium.starter.plus') }}"><i class="bi bi-house me-2"></i>Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('recipes.my') }}"><i class="bi bi-journal me-2"></i>Menu Saya</a></li>
                        <li><a class="dropdown-item" href="{{ route('recipes.create') }}"><i class="bi bi-plus-circle me-2"></i>Create Menu</a></li>
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

    <div class="container py-5">
        <!-- Recipe Hero Section -->
        <div class="recipe-hero">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
            @else
                <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: var(--gradient);">
                    <i class="bi bi-egg-fried display-1 text-white"></i>
                </div>
            @endif
            <div class="hero-content">
                <div class="d-flex justify-content-between align-items-end">
                    <div>
                        <h1 class="display-5 fw-bold mb-2">{{ $recipe->title }}</h1>
                        <div class="d-flex align-items-center gap-3">
                            <span class="ai-badge">
                                <i class="bi bi-robot me-1"></i>AI Verified Recipe
                            </span>
                            @if($recipe->type == 'premium')
                            <span class="premium-badge">
                                <i class="bi bi-star-fill me-1"></i>Premium Exclusive
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-end">
                        <small class="opacity-75">Created by</small>
                        <div class="fw-bold">{{ $recipe->user->nickname }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <!-- Left Column - Recipe Details -->
            <div class="col-lg-8">
                <!-- Stats Grid -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <i class="bi bi-fire"></i>
                        <div class="value">{{ $recipe->calories }}</div>
                        <div class="label">Kalori</div>
                    </div>
                    <div class="stat-card">
                        <i class="bi bi-clock"></i>
                        <div class="value">{{ $recipe->cooking_time }}m</div>
                        <div class="label">Waktu Masak</div>
                    </div>
                    <div class="stat-card">
                        <i class="bi bi-bar-chart"></i>
                        <div class="value">
                            @if($recipe->difficulty == 'easy') Mudah
                            @elseif($recipe->difficulty == 'medium') Sedang
                            @else Sulit
                            @endif
                        </div>
                        <div class="label">Tingkat</div>
                    </div>
                    <div class="stat-card ai">
                        <i class="bi bi-robot"></i>
                        <div class="value">{{ $recipe->type == 'premium' ? 'Premium' : 'Regular' }}</div>
                        <div class="label">Kategori</div>
                    </div>
                </div>

                <!-- Description -->
                <div class="premium-card mb-4">
                    <div class="premium-header">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-card-text me-2"></i>Deskripsi Menu
                        </h3>
                    </div>
                    <div class="p-4">
                        <p class="lead">{{ $recipe->description }}</p>
                        <div class="mt-3">
                            <span class="premium-feature-tag">
                                <i class="bi bi-check-circle me-1"></i>AI Recommended
                            </span>
                            <span class="premium-feature-tag feature-tag-ai">
                                <i class="bi bi-lightning me-1"></i>Diet Friendly
                            </span>
                            @if($recipe->calories < 400)
                            <span class="premium-feature-tag">
                                <i class="bi bi-droplet me-1"></i>Low Calorie
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- AI Nutrition Insight -->
                <div class="ai-insight mb-4">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="bi bi-robot display-5" style="color: var(--accent);"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-2">🤖 AI Nutrition Insight</h5>
                            <p class="mb-0">
                                Menu ini mengandung {{ $recipe->calories }} kalori dengan tingkat kesulitan {{ $recipe->difficulty }}.
                                @if($recipe->calories < 350)
                                Perfect untuk diet rendah kalori!
                                @elseif($recipe->calories < 500)
                                Cocok untuk makan siang yang sehat.
                                @else
                                Ideal untuk kebutuhan energi tinggi.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Ingredients -->
                <div class="premium-card mb-4">
                    <div class="premium-header">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-list-check me-2"></i>
                            Bahan-bahan <span class="badge bg-light text-dark ms-2">{{ count($recipe->ingredients) }} items</span>
                        </h3>
                    </div>
                    <div class="p-4">
                        <div class="row">
                            @foreach($recipe->ingredients as $ingredient)
                            <div class="col-md-6 mb-3">
                                <div class="ingredient-card">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                 style="width: 35px; height: 35px;">
                                                <i class="bi bi-check"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0">{{ $ingredient }}</h6>
                                            <small class="text-muted">Premium quality ingredient</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="premium-card mb-4">
                    <div class="premium-header">
                        <h3 class="fw-bold mb-0">
                            <i class="bi bi-list-ol me-2"></i>
                            Cara Membuat <span class="badge bg-light text-dark ms-2">{{ count($recipe->instructions) }} steps</span>
                        </h3>
                    </div>
                    <div class="p-4">
                        @foreach($recipe->instructions as $index => $instruction)
                        <div class="step-card">
                            <div class="step-number">{{ $index + 1 }}</div>
                            <div class="step-content">
                                <h5 class="fw-bold mb-3">Step {{ $index + 1 }}</h5>
                                <p class="mb-0">{{ $instruction }}</p>
                                @if($index == 0)
                                <small class="text-muted mt-2 d-block">
                                    <i class="bi bi-lightbulb me-1"></i>Pro tip: Pastikan semua bahan sudah siap sebelum mulai
                                </small>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- AI Meal Recommendation -->
                <div class="ai-recommendation">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-magic me-2"></i>AI Meal Pairing Recommendation
                    </h5>
                    <p>
                        Menu ini cocok dipasangkan dengan:
                        @if($recipe->calories < 400)
                        <strong>Jus buah segar</strong> untuk menambah vitamin, atau
                        <strong>salad hijau</strong> untuk serat tambahan.
                        @else
                        <strong>Sup sayuran ringan</strong> sebagai pembuka, atau
                        <strong>teh hijau</strong> sebagai pendamping.
                        @endif
                    </p>
                    <button class="btn-ai btn-sm mt-2" onclick="generateMealPairing()">
                        <i class="bi bi-robot me-1"></i>Generate More Pairings
                    </button>
                </div>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-4">
                <!-- Nutrition Facts -->
                <div class="nutrition-facts mb-4">
                    <h4 class="fw-bold mb-4 text-center">
                        <i class="bi bi-clipboard-data me-2"></i>Nutrition Facts
                    </h4>

                    <div class="progress-ring mb-4">
                        <canvas id="nutritionChart" width="120" height="120"></canvas>
                    </div>

                    <div class="text-center mb-4">
                        <h2 class="fw-bold" id="calorieDisplay">{{ $recipe->calories }}</h2>
                        <small class="text-muted">Total Calories</small>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <small>Protein</small>
                            <small class="fw-bold">~{{ round($recipe->calories * 0.3 / 4) }}g</small>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: 30%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <small>Carbs</small>
                            <small class="fw-bold">~{{ round($recipe->calories * 0.5 / 4) }}g</small>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <small>Fat</small>
                            <small class="fw-bold">~{{ round($recipe->calories * 0.2 / 9) }}g</small>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-danger" style="width: 20%"></div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Estimated nutrition values based on AI analysis
                        </small>
                    </div>
                </div>

                <!-- Author Info -->
                <div class="author-card mb-4">
                    <div class="author-avatar">
                        {{ substr($recipe->user->nickname, 0, 2) }}
                    </div>
                    <h5 class="fw-bold mb-1">{{ $recipe->user->nickname }}</h5>
                    <p class="text-muted small mb-3">Premium+ Chef</p>

                    <div class="d-flex justify-content-center gap-3 mb-3">
                        <div class="text-center">
                            <div class="fw-bold">{{ $recipe->user->recipes()->count() }}</div>
                            <small class="text-muted">Recipes</small>
                        </div>
                        <div class="text-center">
                            <div class="fw-bold">
                                @php
                                    $days = $recipe->user->created_at->diffInDays(now());
                                @endphp
                                {{ $days }}
                            </div>
                            <small class="text-muted">Days</small>
                        </div>
                    </div>

                    <button class="btn-premium btn-sm w-100" onclick="followAuthor()">
                        <i class="bi bi-person-plus me-1"></i>Follow Chef
                    </button>
                </div>

                <!-- Share & Save -->
                <div classpremium-card mb-4>
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-share me-2"></i>Share Recipe
                        </h5>
                        <div class="share-buttons">
                            <button class="share-btn facebook">
                                <i class="bi bi-facebook"></i>
                            </button>
                            <button class="share-btn twitter">
                                <i class="bi bi-twitter"></i>
                            </button>
                            <button class="share-btn whatsapp">
                                <i class="bi bi-whatsapp"></i>
                            </button>
                            <button class="share-btn copy" onclick="copyRecipeLink()">
                                <i class="bi bi-link-45deg"></i>
                            </button>
                        </div>

                        <div class="mt-4">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-bookmark me-2"></i>Save Recipe
                            </h5>
                            <button class="btn-premium w-100" onclick="saveToCollection()">
                                <i class="bi bi-bookmark-plus me-1"></i>Add to Collection
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Premium Features -->
                <div class="premium-card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">
                            <i class="bi bi-stars me-2"></i>Premium+ Features
                        </h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Unlimited Recipe Access
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                AI Nutrition Analysis
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Premium Recipe Creation
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Advanced Analytics
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Priority Support
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Action Buttons -->
    <div class="floating-actions">
        <button class="floating-btn back" onclick="window.history.back()">
            <i class="bi bi-arrow-left"></i>
        </button>

        @if(Auth::id() == $recipe->user_id)
        <button class="floating-btn edit" onclick="window.location.href='{{ route('recipes.edit', $recipe->id) }}'">
            <i class="bi bi-pencil"></i>
        </button>

        <button class="floating-btn delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="bi bi-trash"></i>
        </button>
        @endif

        <button class="floating-btn" style="background: var(--gradient-accent);" onclick="scrollToTop()">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle text-danger me-2"></i>
                        Delete Premium Recipe
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-trash display-4 text-danger mb-3"></i>
                        <h5 class="fw-bold">Delete "{{ $recipe->title }}"?</h5>
                        <p class="text-muted">This action cannot be undone.</p>
                    </div>

                    <div class="alert alert-warning">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Premium Feature:</strong> Deleting this recipe will remove it from your collection and analytics.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash me-1"></i>Delete Permanently
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Nutrition Chart
        function initNutritionChart() {
            const ctx = document.getElementById('nutritionChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [30, 50, 20],
                        backgroundColor: ['#4CAF50', '#FF9800', '#F44336'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '70%',
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const labels = ['Protein', 'Carbs', 'Fat'];
                                    return `${labels[context.dataIndex]}: ${context.parsed}%`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Copy Recipe Link
        function copyRecipeLink() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(() => {
                showToast('✅ Recipe link copied!', 'success');
            });
        }

        // Save to Collection
        function saveToCollection() {
            // Simulate API call
            setTimeout(() => {
                showToast('⭐ Recipe saved to your collection!', 'success');
            }, 500);
        }

        // Follow Author
        function followAuthor() {
            setTimeout(() => {
                showToast('👨‍🍳 You are now following this chef!', 'success');
            }, 500);
        }

        // Generate Meal Pairing
        function generateMealPairing() {
            const pairings = [
                "Green smoothie with spinach and banana",
                "Fresh fruit salad with mint",
                "Herbal tea with lemon",
                "Greek yogurt with honey",
                "Mixed nuts and dried fruits"
            ];

            const randomPairing = pairings[Math.floor(Math.random() * pairings.length)];

            showToast(`🍽️ AI Suggestion: Try ${randomPairing}`, 'info');
        }

        // Scroll to top
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Toast notification
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-bg-${type} border-0 position-fixed bottom-0 end-0 m-3`;
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

            document.body.appendChild(toast);
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }

        // Initialize on load
        document.addEventListener('DOMContentLoaded', function() {
            initNutritionChart();

            // Animate calorie counter
            const calorieEl = document.getElementById('calorieDisplay');
            const calories = {{ $recipe->calories }};
            let count = 0;
            const duration = 1500;
            const increment = calories / (duration / 16);

            const timer = setInterval(() => {
                count += increment;
                if (count >= calories) {
                    count = calories;
                    clearInterval(timer);
                }
                calorieEl.textContent = Math.round(count);
            }, 16);
        });

        // Check for success message from session
        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif
    </script>
</body>
</html>
