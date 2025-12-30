<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatJoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4CAF50;
            --secondary: #2196F3;
            --accent: #FF9800;
            --light: #f8f9fa;
            --dark: #333;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary) !important;
            font-size: 1.8rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 80px 0;
            border-radius: 0 0 30px 30px;
            margin-bottom: 50px;
        }

        .recipe-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .recipe-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .recipe-image {
            height: 180px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            border-radius: 15px 15px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 3rem;
        }

        .calorie-badge {
            background: var(--accent);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
        }

        .feature-card {
            text-align: center;
            padding: 30px 20px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .testimonial-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
        }

        .avatar {
            width: 60px;
            height: 60px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-right: 15px;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: #45a049;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
            border-radius: 25px;
            padding: 8px 20px;
        }

        .btn-outline-primary:hover {
            background: var(--primary);
            color: white;
        }

        .modal-content {
            border-radius: 20px;
            border: none;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-egg-fried me-2"></i>EatJoy
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link me-3" href="#features">Fitur</a>
                <a class="nav-link me-3" href="#menu">Menu</a>
                <a class="nav-link me-3" href="#testimoni">Testimoni</a>
                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                <a class="btn btn-primary" href="{{ route('register') }}">Daftar Gratis</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Mulai Perjalanan Diet Sehatmu dengan EatJoy</h1>
                    <p class="lead mb-4">Platform diet lengkap dengan 25+ menu sehat, kalkulator BMI, daily planner, dan AI assistant untuk bimbingan personal.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5">
                            Mulai Sekarang <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="feature-card d-inline-block">
                        <i class="bi bi-egg-fried display-1 text-primary"></i>
                        <h4 class="mt-3">Diet Jadi Menyenangkan</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Unggulan EatJoy</h2>
                <p class="text-muted">Semua yang Anda butuhkan untuk program diet sehat</p>
            </div>
            <div class="row">
                @foreach($features as $feature)
                <div class="col-md-3 mb-4">
                    <div class="feature-card">
                        <i class="bi {{ $feature['icon'] }} feature-icon"></i>
                        <h5>{{ $feature['title'] }}</h5>
                        <p class="text-muted">{{ $feature['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Menu Preview Section -->
    <section id="menu" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Preview Menu Diet</h2>
                <p class="text-muted">Login untuk melihat detail lengkap resep dan alat bahan</p>
            </div>

            <div class="row">
                @forelse($recipes as $recipe)
                <div class="col-md-3 mb-4">
                    <div class="recipe-card">
                        <div class="recipe-image">
                            <i class="bi bi-egg-fried"></i>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">{{ $recipe->title }}</h5>
                                <span class="calorie-badge">{{ $recipe->calories }} cal</span>
                            </div>
                            <p class="card-text text-muted mb-4" style="font-size: 0.9rem;">
                                {{ Str::limit($recipe->description, 80) }}
                            </p>
                            <button class="btn btn-outline-primary w-100 view-recipe-btn"
                                    data-title="{{ $recipe->title }}"
                                    data-calories="{{ $recipe->calories }}"
                                    data-description="{{ $recipe->description }}">
                                Lihat Preview
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> Belum ada menu tersedia.
                    </div>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-4">
                <p class="text-muted">Ingin melihat 25+ menu lengkap dengan alat & bahan?</p>
                <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-5">
                    <i class="bi bi-person-plus"></i> Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- BMI Calculator -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Kalkulator BMI Gratis</h2>
                    <p class="text-muted mb-4">Hitung Indeks Massa Tubuh Anda secara gratis dan dapatkan rekomendasi program diet yang sesuai.</p>
                    <form id="bmiForm" class="bg-white p-4 rounded shadow-sm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tinggi Badan (cm)</label>
                                <input type="number" class="form-control" id="height" placeholder="Contoh: 170" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Berat Badan (kg)</label>
                                <input type="number" class="form-control" id="weight" placeholder="Contoh: 65" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Hitung BMI Sekarang</button>
                    </form>
                    <div class="mt-3" id="bmiResult"></div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary text-white p-5 rounded">
                        <h4><i class="bi bi-info-circle"></i> Kategori BMI</h4>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><span class="badge bg-danger">Kurus</span> < 18.5</li>
                            <li class="mb-2"><span class="badge bg-success">Normal</span> 18.5 - 24.9</li>
                            <li class="mb-2"><span class="badge bg-warning">Gemuk</span> 25 - 29.9</li>
                            <li><span class="badge bg-danger">Obesitas</span> ≥ 30</li>
                        </ul>
                        <p class="mt-4">Dengan mendaftar, Anda bisa mendapatkan analisis BMI lebih detail dan rekomendasi program diet personal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimoni" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Testimoni Pengguna</h2>
                <p class="text-muted">Lihat pengalaman mereka yang sudah merasakan manfaat EatJoy</p>
            </div>
            <div class="row">
                @foreach($testimonials as $testimonial)
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar">
                                {{ $testimonial['avatar'] }}
                            </div>
                            <div>
                                <h5 class="mb-0">{{ $testimonial['name'] }}</h5>
                                <small class="text-muted">Pengguna EatJoy Starter+</small>
                            </div>
                        </div>
                        <p class="mb-0">"{{ $testimonial['text'] }}"</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="fw-bold">
                        <i class="bi bi-egg-fried"></i> EatJoy
                    </h4>
                    <p class="text-white-50 mt-3">Platform diet sehat dengan menu personal, planner harian, dan AI assistant untuk mencapai berat badan ideal Anda.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">Fitur</h5>
                    <ul class="list-unstyled">
                        <li><a href="#menu" class="text-white-50 text-decoration-none">Menu Diet</a></li>
                        <li><a href="#features" class="text-white-50 text-decoration-none">Kalkulator BMI</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">Daily Planner</a></li>
                        <li><a href="#" class="text-white-50 text-decoration-none">AI Assistant</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold">Kontak</h5>
                    <ul class="list-unstyled text-white-50">
                        <li><i class="bi bi-envelope me-2"></i> eatjoy@care.com</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 857 5511 3563</li>
                        <li><i class="bi bi-geo-alt me-2"></i> Surabaya, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-white my-4">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 EatJoy - Program Diet Sehat. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Recipe Preview Modal -->
    <div class="modal fade" id="recipeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalRecipeTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <span class="calorie-badge" id="modalRecipeCalories"></span>
                    </div>
                    <p id="modalRecipeDescription" class="text-muted"></p>
                    <div class="alert alert-info mt-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            <div>
                                <strong>Login diperlukan!</strong><br>
                                Untuk melihat alat & bahan serta cara pembuatan lengkap, silakan login atau daftar terlebih dahulu.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-success">
                        <i class="bi bi-person-plus"></i> Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Recipe Preview Modal
        document.addEventListener('DOMContentLoaded', function() {
            const recipeButtons = document.querySelectorAll('.view-recipe-btn');
            const recipeModal = new bootstrap.Modal(document.getElementById('recipeModal'));

            recipeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('modalRecipeTitle').textContent = this.dataset.title;
                    document.getElementById('modalRecipeCalories').textContent = this.dataset.calories + ' Kalori';
                    document.getElementById('modalRecipeDescription').textContent = this.dataset.description;
                    recipeModal.show();
                });
            });

            // BMI Calculator
            const bmiForm = document.getElementById('bmiForm');
            const bmiResult = document.getElementById('bmiResult');

            bmiForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const height = parseFloat(document.getElementById('height').value) / 100;
                const weight = parseFloat(document.getElementById('weight').value);

                if (height > 0 && weight > 0) {
                    const bmi = (weight / (height * height)).toFixed(1);
                    let category = '';
                    let color = '';
                    let advice = '';

                    if (bmi < 18.5) {
                        category = 'Kurus';
                        color = 'danger';
                        advice = 'Disarankan untuk menambah berat badan dengan makanan bergizi.';
                    } else if (bmi < 25) {
                        category = 'Normal';
                        color = 'success';
                        advice = 'Berat badan Anda ideal! Pertahankan dengan pola makan sehat.';
                    } else if (bmi < 30) {
                        category = 'Gemuk';
                        color = 'warning';
                        advice = 'Disarankan untuk menurunkan berat badan dengan diet sehat.';
                    } else {
                        category = 'Obesitas';
                        color = 'danger';
                        advice = 'Segera konsultasi dengan ahli gizi untuk program diet yang aman.';
                    }

                    bmiResult.innerHTML = `
                        <div class="alert alert-${color}">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-${color === 'success' ? 'check-circle' : 'exclamation-circle'} display-6 me-3"></i>
                                <div>
                                    <h4 class="alert-heading">BMI: ${bmi} (${category})</h4>
                                    <p class="mb-0">${advice}</p>
                                    <hr>
                                    <p class="mb-0"><small>Daftar untuk mendapatkan rekomendasi menu diet personal berdasarkan BMI Anda.</small></p>
                                </div>
                            </div>
                        </div>
                    `;
                } else {
                    bmiResult.innerHTML = `
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i>
                            Silakan masukkan tinggi dan berat badan yang valid.
                        </div>
                    `;
                }
            });

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
