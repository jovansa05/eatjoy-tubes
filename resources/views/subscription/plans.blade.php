<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Langganan - EatJoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #4A90E2;
            --accent: #FF6584;
            --free: #FFA726;           /* KUNING (sesuai dashboard free) */
            --starter: #4CAF50;        /* HIJAU (sesuai dashboard starter) */
            --starter-plus: #9C27B0;   /* UNGU (sesuai dashboard starter+) */
            --light: #F8F9FF;
            --dark: #2D3436;
            --gradient: linear-gradient(135deg, #6C63FF 0%, #4A90E2 100%);
            --gradient-free: linear-gradient(135deg, #FFA726 0%, #FF9800 100%);
            --gradient-starter: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%);
            --gradient-starter-plus: linear-gradient(135deg, #9C27B0 0%, #673AB7 100%);
            --card-shadow: 0 20px 40px rgba(108, 99, 255, 0.1);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7ff 0%, #f0f2ff 100%);
            min-height: 100vh;
            padding-top: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 10% 20%, rgba(108, 99, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(255, 101, 132, 0.05) 0%, transparent 50%);
            z-index: -1;
        }

        .page-header {
            text-align: center;
            margin-bottom: 60px;
            padding: 40px 20px;
            position: relative;
        }

        .header-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: var(--secondary);
            border-radius: 0 0 40px 40px;
            z-index: -1;
        }

        .page-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
        }

        .plans-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .plan-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
        }

        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(108, 99, 255, 0.15);
        }

        .plan-card.popular {
            border: 3px solid var(--starter);
        }

        .plan-card.best {
            border: 3px solid var(--starter-plus);
        }

        .plan-header {
            padding: 30px 30px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .free .plan-header {
            background: linear-gradient(135deg, rgba(255, 167, 38, 0.1), rgba(255, 152, 0, 0.1));
        }

        .starter .plan-header {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(56, 142, 60, 0.1));
        }

        .starter-plus .plan-header {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(103, 58, 183, 0.1));
        }

        .plan-badge {
            position: absolute;
            top: 20px;
            right: -30px;
            background: var(--accent);
            color: white;
            padding: 8px 40px;
            font-size: 0.85rem;
            font-weight: 600;
            transform: rotate(45deg);
            box-shadow: 0 3px 15px rgba(255, 101, 132, 0.3);
        }

        .plan-badge.popular {
            background: var(--starter);
        }

        .plan-badge.best {
            background: var(--starter-plus);
        }

        .plan-name {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .free .plan-name {
            color: var(--free);
        }

        .starter .plan-name {
            color: var(--starter);
        }

        .starter-plus .plan-name {
            color: var(--starter-plus);
        }

        .plan-subtitle {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.4;
            min-height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .plan-price {
            margin: 20px 0;
        }

        .price-amount {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
        }

        .free .price-amount {
            color: var(--free);
        }

        .starter .price-amount {
            color: var(--starter);
        }

        .starter-plus .price-amount {
            color: var(--starter-plus);
        }

        .price-period {
            font-size: 1rem;
            color: #666;
            margin-top: 5px;
        }

        .plan-body {
            padding: 0 30px 20px;
            flex: 1;
        }

        .features-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-align: center;
            min-height: 40px;
        }

        .features-title i {
            color: var(--primary);
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #cacdcd;
        }

        .feature-item:last-child {
            border-bottom: none;
        }

        .feature-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .feature-icon.available {
            color: #2fff44;
            background: rgba(76, 175, 80, 0.1);
            border: 2px solid #13ff1a;
            border-radius: 6px;
        }

        .feature-icon.unavailable {
            color: #fd4747;
            background: rgba(153, 153, 153, 0.1);
            border: 2px solid #FF5252;
            border-radius: 6px;
        }

        .feature-text {
            flex: 1;
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .feature-tag {
            display: inline-block;
            background: rgba(108, 99, 255, 0.1);
            color: var(--primary);
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            margin-left: 5px;
        }

        .plan-footer {
            padding: 20px 30px 30px;
            text-align: center;
            margin-top: auto;
        }

        .btn-subscribe {
            height: 52px;
            width: 100%;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .free .btn-subscribe {
            background: var(--gradient-free);
            color: white;
        }

        .free .btn-subscribe:hover {
            background: linear-gradient(135deg, #FF9800 0%, #F57C00 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 167, 38, 0.3);
        }

        .starter .btn-subscribe {
            background: var(--gradient-starter);
            color: white;
        }

        .starter .btn-subscribe:hover {
            background: linear-gradient(135deg, #2E7D32 0%, #1B5E20 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
        }

        .starter-plus .btn-subscribe {
            background: var(--gradient-starter-plus);
            color: white;
        }

        .starter-plus .btn-subscribe:hover {
            background: linear-gradient(135deg, #673AB7 0%, #4A148C 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(156, 39, 176, 0.3);
        }

        .price-note {
            font-size: 0.85rem;
            color: #999;
            margin-top: 10px;
            line-height: 1.4;
        }

        .comparison-table {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px;
            margin-top: 60px;
            margin-bottom: 40px;
        }

        .comparison-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 40px;
        }

        .table-responsive {
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #eee;
        }

        .comparison-table th {
            background: var(--light);
            font-weight: 600;
            border: none;
            padding: 20px;
        }

        .comparison-table td {
            padding: 20px;
            border-color: #eee;
            vertical-align: middle;
        }

        .feature-check {
            color: #4CAF50;
            font-size: 1.2rem;
        }

        .feature-unavailable {
            color: #999;
            font-size: 1.2rem;
        }

        .faq-section {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px;
            margin-top: 40px;
        }

        .faq-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            text-align: center;
            margin-bottom: 30px;
        }

        .faq-item {
            border: 1px solid #eee;
            border-radius: 12px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .faq-question {
            padding: 20px;
            font-weight: 600;
            color: var(--dark);
            background: #f8f9ff;
            border: none;
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: background 0.3s;
        }

        .faq-question:hover {
            background: #f0f2ff;
        }

        .faq-answer {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-answer.active {
            padding: 20px;
            max-height: 500px;
        }

        @media (max-width: 992px) {
            .plan-card.popular {
                transform: scale(1);
                z-index: 1;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.2rem;
            }

            .plan-header {
                padding: 25px 20px 15px;
            }

            .plan-body {
                padding: 0 20px 15px;
            }

            .plan-footer {
                padding: 15px 20px 25px;
            }

            .comparison-table {
                padding: 25px;
            }

            .faq-section {
                padding: 25px;
            }

            .plan-subtitle {
                min-height: auto;
                padding: 0 10px;
            }

            .features-title {
                min-height: auto;
                padding: 0 10px;
            }
        }

        /* Animation for plan cards */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .plan-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .plan-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .plan-card:nth-child(3) {
            animation-delay: 0.4s;
        }

        /* Uniform height for all cards */
        .features-list {
            min-height: 320px;
        }

        .feature-item {
            min-height: 48px;
            display: flex;
            align-items: center;
        }

        /* Color indicators untuk konsistensi dengan dashboard */
        .color-indicator {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .color-dot {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            color: #666;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .dot-free {
            background: var(--free);
        }

        .dot-starter {
            background: var(--starter);
        }

        .dot-starter-plus {
            background: var(--starter-plus);
        }
    </style>
</head>
<body>
    <div class="container-fluid px-0">
        <div class="page-header">
            <div class="header-background"></div>
            <h1 class="page-title">Pilih Paket Langganan</h1>
            <p class="page-subtitle">Upgrade untuk akses fitur premium dan pengalaman diet yang lebih baik</p>
        </div>

        <div class="plans-container">
            <div class="row g-4 justify-content-center">
                <!-- Free Plan (KUNING - sesuai dashboard free) -->
                <div class="col-lg-4">
                    <div class="plan-card free">
                        <div class="plan-header">
                            <div class="plan-name">EatJoy Explorer</div>
                            <p class="plan-subtitle">Mulai perjalanan diet sehatmu dengan akses dasar</p>
                            <div class="plan-price">
                                <div class="price-amount">Rp 0</div>
                                <div class="price-period">Seumur Hidup</div>
                            </div>
                        </div>

                        <div class="plan-body">
                            <h4 class="features-title">
                                <i class="bi bi-gift"></i>
                                Apa yang kamu dapat?
                            </h4>
                            <ul class="features-list">
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Akses 24 Menu Diet</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Kalkulator BMI</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Artikel & Blog Nutrisi</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">Create Menu User</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">Daily Planner</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">Unlocked Premium Dish</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">AI Chat Assistant</span>
                                </li>
                            </ul>
                        </div>

                        <div class="plan-footer">
                            <form method="POST" action="{{ route('subscription.subscribe') }}">
                                @csrf
                                <input type="hidden" name="plan" value="free">
                                <button type="submit" class="btn-subscribe">
                                    <i class="bi bi-check-circle"></i>
                                    Mulai Gratis
                                </button>
                            </form>
                            <p class="price-note">Coba semua fitur dasar tanpa biaya</p>
                        </div>
                    </div>
                </div>

                <!-- Starter Plan (HIJAU - sesuai dashboard starter) -->
                <div class="col-lg-4">
                    <div class="plan-card starter popular">
                        <div class="plan-badge popular">POPULER</div>
                        <div class="plan-header">
                            <div class="plan-name">EatJoy Starter</div>
                            <p class="plan-subtitle">Dapatkan pengalaman diet lebih terstruktur dengan fitur premium</p>
                            <div class="plan-price">
                                <div class="price-amount">Rp 9.900</div>
                                <div class="price-period"><strong>/Bulan</strong></div>
                            </div>
                        </div>

                        <div class="plan-body">
                            <h4 class="features-title">
                                <i class="bi bi-star"></i>
                                Semua fitur Free, plus:
                            </h4>
                            <ul class="features-list">
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Create Menu User</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Daily Planner Premium</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Progress Tracker</span>
                                    <span class="feature-tag">Baru</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Unlocked Premium Dish</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">AI Chat Assistant</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon unavailable">
                                        <i class="bi bi-x-lg"></i>
                                    </div>
                                    <span class="feature-text">Menu Rekomendasi AI</span>
                                </li>
                                <!-- Empty item to match height -->
                                <li class="feature-item" style="visibility: hidden;">
                                    <div class="feature-icon"></div>
                                    <span class="feature-text"></span>
                                </li>
                            </ul>
                        </div>

                        <div class="plan-footer">
                            <form method="POST" action="{{ route('subscription.subscribe') }}">
                                @csrf
                                <input type="hidden" name="plan" value="starter">
                                <button type="submit" class="btn-subscribe">
                                    <i class="bi bi-arrow-right-circle"></i>
                                    Pilih Starter
                                </button>
                            </form>
                            <p class="price-note">Hemat 30% dari harga normal</p>
                        </div>
                    </div>
                </div>

                <!-- Starter+ Plan (UNGU - sesuai dashboard starter+) -->
                <div class="col-lg-4">
                    <div class="plan-card starter-plus best">
                        <div class="plan-badge best">TERBAIK</div>
                        <div class="plan-header">
                            <div class="plan-name">EatJoy Starter+</div>
                            <p class="plan-subtitle">Pengalaman diet premium dengan AI Assistant untuk hasil maksimal</p>
                            <div class="plan-price">
                                <div class="price-amount">Rp 24.900</div>
                                <div class="price-period"><strong>/3 Bulan</strong></div>
                            </div>
                        </div>

                        <div class="plan-body">
                            <h4 class="features-title">
                                <i class="bi bi-award"></i>
                                Semua fitur Starter, plus:
                            </h4>
                            <ul class="features-list">
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">AI Chat Assistant</span>
                                    <span class="feature-tag">Eksklusif</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Menu Rekomendasi AI</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Priority Support</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Analytics Premium</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Unlimited Refresh</span>
                                </li>
                                <li class="feature-item">
                                    <div class="feature-icon available">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <span class="feature-text">Menu Premium Tanpa Batas</span>
                                </li>
                                <!-- Empty items to match height -->
                                <li class="feature-item" style="visibility: hidden;">
                                    <div class="feature-icon"></div>
                                    <span class="feature-text"></span>
                                </li>
                                <li class="feature-item" style="visibility: hidden;">
                                    <div class="feature-icon"></div>
                                    <span class="feature-text"></span>
                                </li>
                            </ul>
                        </div>

                        <div class="plan-footer">
                            <form method="POST" action="{{ route('subscription.subscribe') }}">
                                @csrf
                                <input type="hidden" name="plan" value="starter_plus">
                                <button type="submit" class="btn-subscribe">
                                    <i class="bi bi-rocket-takeoff"></i>
                                    Pilih Starter+
                                </button>
                            </form>
                            <p class="price-note">Hemat 30% dari harga bulanan biasa</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparison Table -->
            <div class="comparison-table">
                <h2 class="comparison-title">Perbandingan Fitur Lengkap</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fitur</th>
                                <th class="text-center" style="color: var(--free);">Free</th>
                                <th class="text-center" style="color: var(--starter);">Starter</th>
                                <th class="text-center" style="color: var(--starter-plus);">Starter+</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Akses 24 Menu Diet</td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Kalkulator BMI</td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Artikel & Blog</td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Create Menu User</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Daily Planner</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Progress Tracker</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Premium Dish</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>AI Chat Assistant</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                            <tr>
                                <td>Menu Rekomendasi AI</td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-x-lg feature-unavailable"></i></td>
                                <td class="text-center"><i class="bi bi-check-lg feature-check"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
            const faqQuestions = document.querySelectorAll('.faq-question');

            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    const answer = this.nextElementSibling;
                    const icon = this.querySelector('i');

                    // Close all other answers
                    document.querySelectorAll('.faq-answer').forEach(item => {
                        if (item !== answer) {
                            item.classList.remove('active');
                            item.previousElementSibling.querySelector('i').classList.remove('bi-chevron-up');
                            item.previousElementSibling.querySelector('i').classList.add('bi-chevron-down');
                        }
                    });

                    // Toggle current answer
                    answer.classList.toggle('active');
                    icon.classList.toggle('bi-chevron-down');
                    icon.classList.toggle('bi-chevron-up');
                });
            });

            // Add animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Animate plan cards on scroll
            const planCards = document.querySelectorAll('.plan-card');
            planCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Smooth hover effects
            const subscribeButtons = document.querySelectorAll('.btn-subscribe');

            subscribeButtons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px) scale(1.02)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Form submission
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('.btn-subscribe');
                    const originalText = button.innerHTML;

                    // Tampilkan loading state
                    button.innerHTML = '<i class="bi bi-arrow-repeat spin"></i> Memproses...';
                    button.disabled = true;

                    // Biarkan form submit ke Laravel
                    // Loading state akan hilang saat halaman redirect
                });
            });

            // Add spin animation
            const style = document.createElement('style');
            style.textContent = `
                .spin {
                    animation: spin 1s linear infinite;
                }

                @keyframes spin {
                    from { transform: rotate(0deg); }
                    to { transform: rotate(360deg); }
                }
            `;
            document.head.appendChild(style);
        });

            <form method="POST" action="{{ route('subscription.pay.redirect') }}">
            @csrf
            <input type="hidden" name="plan" value="starter">
            <button type="submit">Pilih Starter</button>
        </form>

            <form method="POST" action="{{ route('subscription.pay.redirect') }}">
            @csrf
            <input type="hidden" name="plan" value="starter_plus">
            <button type="submit">Pilih Starter+</button>
        </form>
    </script>
</body>
</html>
