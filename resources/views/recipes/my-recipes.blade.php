<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Menu - EatJoy</title>
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

        .premium-navbar {
            background: white;
            box-shadow: 0 4px 20px rgba(156, 39, 176, 0.15);
            border-bottom: 3px solid var(--primary);
        }

        .premium-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            border-top: 4px solid var(--primary);
            background: white;
            position: relative;
        }

        .premium-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gradient);
        }

        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(156, 39, 176, 0.2);
        }

        .premium-badge {
            background: var(--gradient);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .ai-badge {
            background: var(--gradient-accent);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
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
            box-shadow: 0 8px 20px rgba(156, 39, 176, 0.3);
            color: white;
        }

        .btn-ai {
            background: var(--gradient-accent);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-ai:hover {
            background: linear-gradient(135deg, #00ACC1, #00838F);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 188, 212, 0.3);
        }

        .recipe-card-premium {
            border: 1px solid #E1BEE7;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            background: white;
            position: relative;
        }

        .recipe-card-premium:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(156, 39, 176, 0.15);
            border-color: var(--primary);
        }

        .recipe-card-premium.premium {
            border: 2px solid #FF9800;
            background: linear-gradient(135deg, #FFF8E1, #FFECB3);
        }

        .recipe-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
            background: linear-gradient(135deg, #F3E5F5, #E1BEE7);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .recipe-stats {
            background: rgba(156, 39, 176, 0.05);
            padding: 10px;
            border-radius: 10px;
            margin: 10px 0;
        }

        .stats-icon {
            width: 30px;
            height: 30px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            border: 2px dashed #E1BEE7;
        }

        .empty-state-icon {
            font-size: 4rem;
            color: #E1BEE7;
            margin-bottom: 20px;
        }

        .feature-tag {
            display: inline-block;
            background: rgba(156, 39, 176, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
            border: 1px solid rgba(156, 39, 176, 0.2);
        }

        .ai-suggestion {
            background: #E0F7FA;
            border-left: 4px solid #00BCD4;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .pagination-premium .page-link {
            border: none;
            color: var(--primary);
            border-radius: 10px;
            margin: 0 5px;
        }

        .pagination-premium .page-item.active .page-link {
            background: var(--gradient);
            color: white;
        }

        .premium-filter {
            background: white;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border: 1px solid #F3E5F5;
        }

        .search-box-premium {
            position: relative;
        }

        .search-box-premium input {
            border-radius: 20px;
            padding-left: 40px;
            border: 1px solid #E1BEE7;
        }

        .search-box-premium i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
        }

        .floating-action-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.3);
            transition: all 0.3s;
            z-index: 1000;
            border: none;
        }

        .floating-action-btn:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 15px 35px rgba(156, 39, 176, 0.4);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg premium-navbar py-3">
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
                <!-- User Menu -->
                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                        <div class="user-avatar me-2" style="width: 40px; height: 40px; background: var(--gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                            {{ substr(Auth::user()->nickname, 0, 2) }}
                        </div>
                        <div class="text-start">
                            <div class="fw-bold">{{ Auth::user()->nickname }}</div>
                            <small class="text-muted">Premium+ User</small>
                        </div>
                        <i class="bi bi-chevron-down ms-2"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('dashboard.premium.starter.plus') }}"><i class="bi bi-house me-2"></i>Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('recipes.my') }}"><i class="bi bi-journal me-2"></i>My Menu</a></li>
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
        <!-- Header -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="premium-card">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1 class="fw-bold mb-2">
                                    <i class="bi bi-journal-text me-2" style="color: var(--primary);"></i>
                                    My Menu
                                </h1>
                                <p class="text-muted mb-4">
                                    Kelola semua menu diet yang telah Anda buat.
                                    <span class="text-primary fw-semibold">Premium+</span> memberikan Anda unlimited access untuk membuat dan menyimpan menu.
                                </p>

                                <!-- Stats -->
                                <div class="d-flex gap-4">
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ $recipes->total() }}</h3>
                                        <small class="text-muted">Total Menu</small>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ $recipes->where('type', 'premium')->count() }}</h3>
                                        <small class="text-muted">Menu Premium</small>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-0">{{ $recipes->where('visibility', 'public')->count() }}</h3>
                                        <small class="text-muted">Publik</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="premium-filter">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="search-box-premium">
                                <i class="bi bi-search"></i>
                                <input type="text" class="form-control" placeholder="Cari menu..." id="searchInput">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex gap-2 justify-content-end">
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-filter me-1"></i>Filter
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="filterRecipes('all')">Semua Menu</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterRecipes('premium')">Premium Only</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterRecipes('regular')">Regular Only</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterRecipes('public')">Publik</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="filterRecipes('private')">Privat</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-sort-down me-1"></i>Urutkan
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="sortRecipes('newest')">Terbaru</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="sortRecipes('oldest')">Terlama</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="sortRecipes('calories_high')">Kalori Tertinggi</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="sortRecipes('calories_low')">Kalori Terendah</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Recipes Grid -->
        @if($recipes->isEmpty())
            <div class="row">
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="bi bi-journal-x"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Belum ada menu yang dibuat</h4>
                        <p class="text-muted mb-4">
                            Mulai buat menu diet pertama Anda! <br>
                            Dengan Premium+, Anda bisa membuat unlimited menu dengan AI suggestions.
                        </p>
                        <div class="d-flex gap-3 justify-content-center">
                            <a href="{{ route('recipes.create') }}" class="btn-premium btn-lg">
                                <i class="bi bi-robot me-2"></i>Buat Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="recipesGrid">
                @foreach($recipes as $recipe)
                    <div class="col recipe-item"
                         data-type="{{ $recipe->type }}"
                         data-visibility="{{ $recipe->visibility }}"
                         data-calories="{{ $recipe->calories }}"
                         data-date="{{ $recipe->created_at->timestamp }}"
                         data-title="{{ strtolower($recipe->title) }}">
                        <div class="recipe-card-premium {{ $recipe->type == 'premium' ? 'premium' : '' }}">
                            <!-- Recipe Image -->
                            @if($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}"
                                     class="recipe-image"
                                     alt="{{ $recipe->title }}">
                            @else
                                <div class="recipe-image">
                                    <i class="bi bi-egg-fried" style="font-size: 3rem; color: #CE93D8;"></i>
                                </div>
                            @endif

                            <div class="p-4">
                                <!-- Recipe Header -->
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="fw-bold mb-0" style="color: var(--dark);">
                                        {{ Str::limit($recipe->title, 30) }}
                                    </h5>
                                    <div>
                                        @if($recipe->type == 'premium')
                                            <span class="badge bg-warning text-dark">
                                                <i class="bi bi-star-fill me-1"></i>Premium
                                            </span>
                                        @else
                                            <span class="badge bg-info">
                                                <i class="bi bi-check-circle me-1"></i>Regular
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <p class="text-muted small mb-3">
                                    {{ Str::limit($recipe->description, 80) }}
                                </p>

                                <!-- Stats -->
                                <div class="recipe-stats">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <div class="stats-icon mx-auto mb-1">
                                                <i class="bi bi-fire"></i>
                                            </div>
                                            <div class="fw-bold">{{ $recipe->calories }}</div>
                                            <small class="text-muted">Kalori</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="stats-icon mx-auto mb-1">
                                                <i class="bi bi-clock"></i>
                                            </div>
                                            <div class="fw-bold">{{ $recipe->cooking_time }}m</div>
                                            <small class="text-muted">Waktu</small>
                                        </div>
                                        <div class="col-4">
                                            <div class="stats-icon mx-auto mb-1">
                                                <i class="bi bi-{{ $recipe->visibility == 'public' ? 'globe' : 'lock' }}"></i>
                                            </div>
                                            <div class="fw-bold">{{ $recipe->visibility == 'public' ? 'Publik' : 'Privat' }}</div>
                                            <small class="text-muted">Status</small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Features -->
                                <div class="mb-3">
                                    @php
                                        $ingredientCount = is_array($recipe->ingredients) ? count($recipe->ingredients) : 0;
                                        $instructionCount = is_array($recipe->instructions) ? count($recipe->instructions) : 0;
                                    @endphp
                                    <span class="feature-tag">
                                        <i class="bi bi-list-check me-1"></i>{{ $ingredientCount }} bahan
                                    </span>
                                    <span class="feature-tag">
                                        <i class="bi bi-list-ol me-1"></i>{{ $instructionCount }} langkah
                                    </span>
                                    <span class="feature-tag">
                                        @if($recipe->difficulty == 'easy')
                                            <i class="bi bi-emoji-smile me-1"></i>Mudah
                                        @elseif($recipe->difficulty == 'medium')
                                            <i class="bi bi-emoji-neutral me-1"></i>Sedang
                                        @else
                                            <i class="bi bi-emoji-frown me-1"></i>Sulit
                                        @endif
                                    </span>
                                </div>

                                <!-- Footer -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $recipe->created_at->format('d M Y') }}
                                    </small>
                                    <div class="btn-group">
                                        <a href="{{ route('recipes.show', $recipe->id) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('recipes.edit', $recipe->id) }}"
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button"
                                                class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $recipe->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $recipe->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="bi bi-exclamation-triangle text-danger me-2"></i>
                                        Konfirmasi Hapus
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus menu:</p>
                                    <h6 class="fw-bold text-center my-3">"{{ $recipe->title }}"</h6>
                                    <div class="alert alert-warning">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Menu yang dihapus tidak dapat dikembalikan.
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus Permanen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($recipes->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center pagination-premium">
                                {{ $recipes->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Floating Action Button -->
    <button class="floating-action-btn" onclick="window.location.href='{{ route('recipes.create') }}'">
        <i class="bi bi-plus"></i>
    </button>

    <!-- AI Recommendations Modal -->
    <div class="modal fade" id="aiRecommendationsModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-robot me-2" style="color: #00BCD4;"></i>
                        AI Menu Recommendations
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="ai-suggestion mb-3">
                        <h6 class="fw-bold mb-2">💡 Berdasarkan pola makan Anda, AI menyarankan:</h6>
                        <p>Tambahkan menu tinggi protein untuk meningkatkan metabolisme dan menjaga massa otot.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold">
                                        <i class="bi bi-egg-fried me-2 text-warning"></i>
                                        Protein-Packed Breakfast
                                    </h6>
                                    <p class="text-muted small">Telur dadar dengan sayuran dan avocado</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="badge bg-light text-dark">350 kalori</span>
                                        <span class="badge bg-light text-dark">25g protein</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm mb-3">
                                <div class="card-body">
                                    <h6 class="fw-bold">
                                        <i class="bi bi-basket me-2 text-success"></i>
                                        Lean Lunch Option
                                    </h6>
                                    <p class="text-muted small">Salad ayam panggang dengan quinoa</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="badge bg-light text-dark">450 kalori</span>
                                        <span class="badge bg-light text-dark">35g protein</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn-ai w-100 mt-3" onclick="createFromAI()">
                        <i class="bi bi-magic me-2"></i>Create Menu dari Rekomendasi AI
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filter and Search functionality
        function filterRecipes(filter) {
            const items = document.querySelectorAll('.recipe-item');
            items.forEach(item => {
                switch(filter) {
                    case 'premium':
                        item.style.display = item.dataset.type === 'premium' ? 'block' : 'none';
                        break;
                    case 'regular':
                        item.style.display = item.dataset.type === 'regular' ? 'block' : 'none';
                        break;
                    case 'public':
                        item.style.display = item.dataset.visibility === 'public' ? 'block' : 'none';
                        break;
                    case 'private':
                        item.style.display = item.dataset.visibility === 'private' ? 'block' : 'none';
                        break;
                    default:
                        item.style.display = 'block';
                }
            });
        }

        function sortRecipes(sortBy) {
            const container = document.getElementById('recipesGrid');
            const items = Array.from(container.querySelectorAll('.recipe-item'));

            items.sort((a, b) => {
                switch(sortBy) {
                    case 'newest':
                        return b.dataset.date - a.dataset.date;
                    case 'oldest':
                        return a.dataset.date - b.dataset.date;
                    case 'calories_high':
                        return b.dataset.calories - a.dataset.calories;
                    case 'calories_low':
                        return a.dataset.calories - b.dataset.calories;
                    default:
                        return 0;
                }
            });

            // Clear and re-append sorted items
            items.forEach(item => container.appendChild(item));
        }

        // Live search
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll('.recipe-item');

            items.forEach(item => {
                const title = item.dataset.title;
                if (title.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // AI Recommendations
        function showAIRecommendations() {
            const modal = new bootstrap.Modal(document.getElementById('aiRecommendationsModal'));
            modal.show();
        }

        function createFromAI() {
            // Redirect to create page with AI suggestions
            window.location.href = '{{ route("recipes.create") }}?ai_suggested=true';
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

        // Check for success message from session
        @if(session('success'))
            showToast("{{ session('success') }}", 'success');
        @endif
    </script>
</body>
</html>
