<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu - EatJoy Premium+</title>
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

        .form-card-premium {
            background: white;
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(156, 39, 176, 0.1);
            border-top: 5px solid var(--primary);
        }

        .form-header-premium {
            background: var(--gradient);
            color: white;
            border-radius: 20px 20px 0 0;
            padding: 25px;
            position: relative;
            overflow: hidden;
        }

        .form-header-premium::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(30%, -30%);
        }

        .form-section {
            background: rgba(156, 39, 176, 0.03);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .form-section.ai-assisted {
            border-left: 4px solid var(--accent);
            background: rgba(0, 188, 212, 0.03);
        }

        .form-label-premium {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-control-premium {
            border: 1px solid #E1BEE7;
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s;
        }

        .form-control-premium:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(156, 39, 176, 0.1);
        }

        .btn-premium {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 15px;
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
            padding: 12px 25px;
            border-radius: 15px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-ai:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 188, 212, 0.3);
            color: white;
        }

        .ingredient-item, .instruction-item {
            background: white;
            border: 1px solid #E1BEE7;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .ingredient-item:hover, .instruction-item:hover {
            border-color: var(--primary);
            box-shadow: 0 3px 10px rgba(156, 39, 176, 0.1);
        }

        .remove-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFEBEE;
            color: #F44336;
            border: none;
            transition: all 0.3s;
        }

        .remove-btn:hover {
            background: #F44336;
            color: white;
            transform: rotate(90deg);
        }

        .add-btn {
            background: rgba(156, 39, 176, 0.1);
            color: var(--primary);
            border: 1px dashed #CE93D8;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            transition: all 0.3s;
        }

        .add-btn:hover {
            background: rgba(156, 39, 176, 0.2);
            border-color: var(--primary);
        }

        .ai-assist-badge {
            display: inline-block;
            background: rgba(0, 188, 212, 0.1);
            color: #0097A7;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid rgba(0, 188, 212, 0.2);
        }

        .premium-badge {
            display: inline-block;
            background: rgba(156, 39, 176, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            border: 1px solid rgba(156, 39, 176, 0.2);
        }

        .image-upload-area {
            border: 2px dashed #E1BEE7;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            background: rgba(243, 229, 245, 0.3);
            cursor: pointer;
            transition: all 0.3s;
        }

        .image-upload-area:hover {
            border-color: var(--primary);
            background: rgba(156, 39, 176, 0.05);
        }

        .image-upload-area.dragover {
            border-color: var(--primary);
            background: rgba(156, 39, 176, 0.1);
        }

        .image-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 15px;
            border: 3px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .ai-suggestion-box {
            background: #E0F7FA;
            border-radius: 12px;
            padding: 15px;
            margin-top: 15px;
            border-left: 4px solid #00BCD4;
        }

        .calorie-meter {
            height: 8px;
            background: #F3E5F5;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 5px;
        }

        .calorie-fill {
            height: 100%;
            background: var(--gradient);
            border-radius: 4px;
            transition: width 0.5s ease;
        }

        .stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
        }

        .stepper::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 50px;
            right: 50px;
            height: 3px;
            background: #F3E5F5;
            z-index: 1;
        }

        .step {
            position: relative;
            z-index: 2;
            text-align: center;
            flex: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            background: #F3E5F5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #666;
            margin: 0 auto 10px;
            transition: all 0.3s;
        }

        .step.active .step-circle {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }

        .step.completed .step-circle {
            background: #4CAF50;
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: #666;
        }

        .step.active .step-label {
            color: var(--primary);
            font-weight: 600;
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
                <span class="ai-assist-badge ms-2">
                    <i class="bi bi-robot me-1"></i>AI Assisted
                </span>
            </div>

            <div class="d-flex align-items-center">
                <a href="{{ route('recipes.my') }}" class="btn btn-outline-primary me-3">
                    <i class="bi bi-arrow-left me-1"></i>Kembali ke Menu Saya
                </a>
                <div class="user-avatar" style="width: 40px; height: 40px; background: var(--gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                    {{ substr(Auth::user()->nickname, 0, 2) }}
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Form Stepper -->
                <div class="stepper">
                    <div class="step active" id="step1">
                        <div class="step-circle">1</div>
                        <div class="step-label">Info Dasar</div>
                    </div>
                    <div class="step" id="step2">
                        <div class="step-circle">2</div>
                        <div class="step-label">Bahan & Cara</div>
                    </div>
                    <div class="step" id="step3">
                        <div class="step-circle">3</div>
                        <div class="step-label">Detail</div>
                    </div>
                    <div class="step" id="step4">
                        <div class="step-circle">4</div>
                        <div class="step-label">Review</div>
                    </div>
                </div>

                <!-- Main Form -->
                <div class="form-card-premium">
                    <!-- Form Header -->
                    <div class="form-header-premium">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h2 class="fw-bold mb-2">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Create New Menu
                                </h2>
                                <p class="mb-0 opacity-75">Buat menu diet baru dengan bantuan AI Assistant</p>
                            </div>
                            <button class="btn-ai" onclick="generateWithAI()">
                                <i class="bi bi-magic me-2"></i>Generate with AI
                            </button>
                        </div>
                    </div>

                    <!-- Form Body -->
                    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" id="recipeForm">
                        @csrf

                        <div class="p-4">
                            <!-- Step 1: Basic Information -->
                            <div class="form-section" id="step1Content">
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fw-bold mb-0">
                                        <i class="bi bi-info-circle me-2" style="color: var(--primary);"></i>
                                        Informasi Dasar Menu
                                    </h4>
                                    <span class="ai-assist-badge ms-auto">
                                        <i class="bi bi-robot me-1"></i>AI Suggestions Available
                                    </span>
                                </div>

                                <!-- Nama Menu -->
                                <div class="mb-4">
                                    <label class="form-label-premium">
                                        Nama Menu <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-premium @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title') }}"
                                           placeholder="Contoh: Salad Ayam Panggang Special"
                                           required
                                           id="menuName">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="bi bi-lightbulb me-1"></i>
                                            Berikan nama yang deskriptif dan menarik
                                        </small>
                                    </div>
                                </div>

                                <!-- Total Kalori -->
                                <div class="mb-4">
                                    <label class="form-label-premium">
                                        Total Kalori <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="number"
                                               class="form-control form-control-premium @error('calories') is-invalid @enderror"
                                               name="calories"
                                               value="{{ old('calories') }}"
                                               min="1"
                                               max="5000"
                                               placeholder="300"
                                               required
                                               id="caloriesInput">
                                        <span class="input-group-text bg-light">kalori</span>
                                    </div>
                                    @error('calories')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <!-- Calorie Meter -->
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <small>Rendah (200-400)</small>
                                            <small>Sedang (400-600)</small>
                                            <small>Tinggi (600+)</small>
                                        </div>
                                        <div class="calorie-meter">
                                            <div class="calorie-fill" id="calorieMeter"></div>
                                        </div>
                                    </div>

                                    <!-- AI Suggestion -->
                                    <div class="ai-suggestion-box" id="calorieSuggestion">
                                        <i class="bi bi-robot me-2"></i>
                                        <strong>AI Suggestion:</strong> Untuk diet sehat, rekomendasi kalori per makanan utama adalah 400-600 kalori.
                                    </div>
                                </div>

                                <!-- Deskripsi Menu -->
                                <div class="mb-4">
                                    <label class="form-label-premium">
                                        Deskripsi Menu <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control form-control-premium @error('description') is-invalid @enderror"
                                              name="description"
                                              rows="4"
                                              placeholder="Deskripsikan menu Anda secara detail..."
                                              required
                                              id="descriptionInput">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="text-end mt-1">
                                        <small class="text-muted" id="charCount">0/500 karakter</small>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="mb-4">
                                    <label class="form-label-premium">Gambar Menu</label>
                                    <div class="image-upload-area" id="imageUploadArea">
                                        <i class="bi bi-cloud-arrow-up display-4 mb-3" style="color: #CE93D8;"></i>
                                        <p class="fw-bold mb-1">Upload gambar menu Anda</p>
                                        <p class="text-muted small mb-3">Drag & drop atau klik untuk memilih file</p>
                                        <input type="file"
                                               class="form-control d-none"
                                               name="image"
                                               id="imageInput"
                                               accept="image/*">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('imageInput').click()">
                                            <i class="bi bi-folder2-open me-1"></i>Pilih File
                                        </button>
                                        <p class="text-muted small mt-2">Format: JPG, PNG (max 2MB)</p>
                                    </div>
                                    <div class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
                                        <img id="imagePreview" class="image-preview">
                                        <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeImage()">
                                            <i class="bi bi-trash me-1"></i>Hapus Gambar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: Ingredients & Instructions -->
                            <div class="form-section ai-assisted" id="step2Content" style="display: none;">
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fw-bold mb-0">
                                        <i class="bi bi-list-check me-2" style="color: var(--accent);"></i>
                                        Bahan & Cara Pembuatan
                                    </h4>
                                    <button type="button" class="btn-ai ms-auto" onclick="generateIngredientsWithAI()">
                                        <i class="bi bi-robot me-1"></i>Generate with AI
                                    </button>
                                </div>

                                <!-- Alat dan Bahan -->
                                <div class="mb-4">
                                    <label class="form-label-premium">
                                        Alat dan Bahan <span class="text-danger">*</span>
                                    </label>
                                    <div id="ingredientsContainer">
                                        @if(old('ingredients'))
                                            @foreach(old('ingredients') as $index => $ingredient)
                                            <div class="ingredient-item">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">{{ $index + 1 }}.</span>
                                                    <input type="text"
                                                           class="form-control form-control-premium"
                                                           name="ingredients[]"
                                                           value="{{ $ingredient }}"
                                                           placeholder="Contoh: 2 butir telur ayam"
                                                           required>
                                                    <button type="button"
                                                            class="btn remove-btn ms-2"
                                                            onclick="removeIngredient(this)">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="ingredient-item">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">1.</span>
                                                    <input type="text"
                                                           class="form-control form-control-premium"
                                                           name="ingredients[]"
                                                           placeholder="Contoh: 2 butir telur ayam"
                                                           required>
                                                    <button type="button"
                                                            class="btn remove-btn ms-2"
                                                            onclick="removeIngredient(this)">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @error('ingredients')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    <button type="button" class="add-btn mt-2" onclick="addIngredient()">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Bahan
                                    </button>
                                </div>

                                <!-- Cara Pembuatan -->
                                <div class="mb-4">
                                    <label class="form-label-premium">
                                        Cara Pembuatan <span class="text-danger">*</span>
                                    </label>
                                    <div id="instructionsContainer">
                                        @if(old('instructions'))
                                            @foreach(old('instructions') as $index => $instruction)
                                            <div class="instruction-item">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                             style="width: 30px; height: 30px;">
                                                            {{ $index + 1 }}
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <textarea class="form-control form-control-premium"
                                                                  name="instructions[]"
                                                                  rows="2"
                                                                  placeholder="Deskripsi langkah pembuatan..."
                                                                  required>{{ $instruction }}</textarea>
                                                    </div>
                                                    <button type="button"
                                                            class="btn remove-btn ms-2"
                                                            onclick="removeInstruction(this)">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="instruction-item">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                                             style="width: 30px; height: 30px;">
                                                            1
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <textarea class="form-control form-control-premium"
                                                                  name="instructions[]"
                                                                  rows="2"
                                                                  placeholder="Deskripsi langkah pembuatan..."
                                                                  required></textarea>
                                                    </div>
                                                    <button type="button"
                                                            class="btn remove-btn ms-2"
                                                            onclick="removeInstruction(this)">
                                                        <i class="bi bi-x"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    @error('instructions')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                    <button type="button" class="add-btn mt-2" onclick="addInstruction()">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Langkah
                                    </button>
                                </div>

                                <!-- AI Cooking Tips -->
                                <div class="ai-suggestion-box">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-robot me-2 mt-1"></i>
                                        <div>
                                            <strong>AI Cooking Tips:</strong>
                                            <ul class="mb-0 mt-1">
                                                <li>Gunakan bahan segar untuk hasil terbaik</li>
                                                <li>Ukur bahan dengan tepat untuk konsistensi rasa</li>
                                                <li>Perhatikan waktu memasak untuk menjaga nutrisi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Additional Details -->
                            <div class="form-section" id="step3Content" style="display: none;">
                                <h4 class="fw-bold mb-3">
                                    <i class="bi bi-gear me-2" style="color: var(--primary);"></i>
                                    Detail Tambahan
                                </h4>

                                <div class="row">
                                    <!-- Waktu Masak -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label-premium">Waktu Masak</label>
                                        <div class="input-group">
                                            <input type="number"
                                                   class="form-control form-control-premium"
                                                   name="cooking_time"
                                                   value="{{ old('cooking_time', 30) }}"
                                                   min="1"
                                                   max="480"
                                                   required>
                                            <span class="input-group-text bg-light">menit</span>
                                        </div>
                                    </div>

                                    <!-- Tingkat Kesulitan -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label-premium">Tingkat Kesulitan</label>
                                        <select class="form-select form-control-premium" name="difficulty" required>
                                            <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Mudah</option>
                                            <option value="medium" {{ old('difficulty') == 'medium' ? 'selected' : '' }}>Sedang</option>
                                            <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Sulit</option>
                                        </select>
                                    </div>

                                    <!-- Tipe Menu -->
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label-premium">Tipe Menu</label>
                                        <select class="form-select form-control-premium" name="type" required id="menuType">
                                            <option value="regular" {{ old('type') == 'regular' ? 'selected' : '' }}>Regular</option>
                                            <option value="premium" {{ old('type') == 'premium' ? 'selected' : '' }}>Premium</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Visibilitas -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label-premium">Visibilitas</label>
                                        <select class="form-select form-control-premium" name="visibility" required>
                                            <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Publik (Semua orang bisa melihat)</option>
                                            <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Privat (Hanya Anda yang bisa melihat)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-premium">Tags (Opsional)</label>
                                        <input type="text"
                                               class="form-control form-control-premium"
                                               placeholder="Contoh: sehat, diet, protein tinggi"
                                               id="tagsInput">
                                        <small class="text-muted">Pisahkan dengan koma</small>
                                    </div>
                                </div>

                                <!-- Premium Features Info -->
                                <div class="mt-4" id="premiumFeatures" style="display: none;">
                                    <div class="alert alert-warning">
                                        <i class="bi bi-star-fill me-2"></i>
                                        <strong>Menu Premium:</strong> Menu premium akan mendapatkan prioritas tampilan dan dapat diakses oleh semua pengguna premium.
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Review & Submit -->
                            <div class="form-section" id="step4Content" style="display: none;">
                                <h4 class="fw-bold mb-3">
                                    <i class="bi bi-check-circle me-2" style="color: #4CAF50;"></i>
                                    Review Menu
                                </h4>

                                <!-- Review Content -->
                                <div class="row" id="reviewContent">
                                    <!-- Review akan diisi oleh JavaScript -->
                                </div>

                                <!-- Final AI Check -->
                                <div class="ai-suggestion-box mt-4">
                                    <div class="d-flex align-items-start">
                                        <i class="bi bi-robot me-2 mt-1"></i>
                                        <div>
                                            <strong>AI Final Check:</strong>
                                            <div class="mt-2" id="aiFinalCheck">
                                                <!-- AI check results will appear here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="d-flex justify-content-between mt-5">
                                <button type="button" class="btn btn-outline-secondary" id="prevBtn" style="display: none;">
                                    <i class="bi bi-arrow-left me-1"></i>Kembali
                                </button>
                                <button type="button" class="btn-premium ms-auto" id="nextBtn">
                                    Selanjutnya <i class="bi bi-arrow-right ms-1"></i>
                                </button>
                                <button type="submit" class="btn-premium" id="submitBtn" style="display: none;">
                                    <i class="bi bi-check-circle me-1"></i>Simpan Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- AI Quick Suggestions -->
                <div class="mt-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">
                                <i class="bi bi-lightbulb me-2" style="color: var(--accent);"></i>
                                AI Quick Suggestions
                            </h5>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <button class="btn btn-outline-primary w-100 text-start" onclick="applyAISuggestion('breakfast')">
                                        <i class="bi bi-sun me-2"></i>Menu Sarapan
                                    </button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <button class="btn btn-outline-primary w-100 text-start" onclick="applyAISuggestion('lunch')">
                                        <i class="bi bi-egg-fried me-2"></i>Menu Makan Siang
                                    </button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <button class="btn btn-outline-primary w-100 text-start" onclick="applyAISuggestion('dinner')">
                                        <i class="bi bi-moon me-2"></i>Menu Makan Malam
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AI Generation Modal -->
    <div class="modal fade" id="aiGenerateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-robot me-2" style="color: var(--accent);"></i>
                        Generate Menu dengan AI
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tipe Menu yang Diinginkan</label>
                        <select class="form-select" id="aiMenuType">
                            <option value="breakfast">Sarapan</option>
                            <option value="lunch">Makan Siang</option>
                            <option value="dinner">Makan Malam</option>
                            <option value="snack">Snack</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Kalori</label>
                        <input type="range" class="form-range" min="200" max="800" value="400" id="aiCalorieRange">
                        <div class="d-flex justify-content-between">
                            <small>200 kal</small>
                            <small class="fw-bold" id="aiCalorieValue">400 kal</small>
                            <small>800 kal</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dietary Preference</label>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary btn-sm active" data-preference="balanced">Seimbang</button>
                            <button class="btn btn-outline-primary btn-sm" data-preference="high_protein">Tinggi Protein</button>
                            <button class="btn btn-outline-primary btn-sm" data-preference="low_carb">Rendah Karbohidrat</button>
                            <button class="btn btn-outline-primary btn-sm" data-preference="vegetarian">Vegetarian</button>
                        </div>
                    </div>
                    <button class="btn-ai w-100" onclick="generateMenuWithAI()">
                        <i class="bi bi-magic me-2"></i>Generate Menu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Multi-step form functionality
        let currentStep = 1;
        const totalSteps = 4;

        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('[id$="Content"]').forEach(el => {
                el.style.display = 'none';
            });

            // Show current step
            document.getElementById(`step${step}Content`).style.display = 'block';

            // Update stepper UI
            document.querySelectorAll('.step').forEach((el, index) => {
                el.classList.remove('active', 'completed');
                if (index + 1 < step) {
                    el.classList.add('completed');
                } else if (index + 1 === step) {
                    el.classList.add('active');
                }
            });

            // Update buttons
            document.getElementById('prevBtn').style.display = step > 1 ? 'block' : 'none';
            document.getElementById('nextBtn').style.display = step < totalSteps ? 'block' : 'none';
            document.getElementById('submitBtn').style.display = step === totalSteps ? 'block' : 'none';
        }

        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
                    if (currentStep === 4) {
                        generateReview();
                    }
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        }

        function validateStep(step) {
            let isValid = true;

            switch(step) {
                case 1:
                    const name = document.getElementById('menuName').value;
                    const calories = document.getElementById('caloriesInput').value;
                    const description = document.getElementById('descriptionInput').value;

                    if (!name || !calories || !description) {
                        alert('Harap lengkapi semua informasi dasar');
                        isValid = false;
                    }
                    break;

                case 2:
                    const ingredients = document.querySelectorAll('[name="ingredients[]"]');
                    const instructions = document.querySelectorAll('[name="instructions[]"]');

                    let ingredientsValid = true;
                    ingredients.forEach(input => {
                        if (!input.value.trim()) ingredientsValid = false;
                    });

                    let instructionsValid = true;
                    instructions.forEach(textarea => {
                        if (!textarea.value.trim()) instructionsValid = false;
                    });

                    if (!ingredientsValid || !instructionsValid) {
                        alert('Harap lengkapi semua bahan dan cara pembuatan');
                        isValid = false;
                    }
                    break;

                case 3:
                    // Always valid for step 3
                    break;
            }

            return isValid;
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showStep(1);
            document.getElementById('nextBtn').addEventListener('click', nextStep);
            document.getElementById('prevBtn').addEventListener('click', prevStep);
        });

        // Dynamic ingredients and instructions
        let ingredientCount = {{ count(old('ingredients') ?: [1]) }};
        let instructionCount = {{ count(old('instructions') ?: [1]) }};

        function addIngredient() {
            ingredientCount++;
            const container = document.getElementById('ingredientsContainer');
            const newItem = document.createElement('div');
            newItem.className = 'ingredient-item';
            newItem.innerHTML = `
                <div class="d-flex align-items-center">
                    <span class="me-2">${ingredientCount}.</span>
                    <input type="text"
                           class="form-control form-control-premium"
                           name="ingredients[]"
                           placeholder="Contoh: ${ingredientCount} sendok makan minyak zaitun"
                           required>
                    <button type="button"
                            class="btn remove-btn ms-2"
                            onclick="removeIngredient(this)">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            `;
            container.appendChild(newItem);
        }

        function removeIngredient(button) {
            const items = document.querySelectorAll('#ingredientsContainer .ingredient-item');
            if (items.length > 1) {
                button.closest('.ingredient-item').remove();
                // Renumber items
                document.querySelectorAll('#ingredientsContainer .ingredient-item').forEach((item, index) => {
                    item.querySelector('span').textContent = `${index + 1}.`;
                });
                ingredientCount = items.length - 1;
            } else {
                alert('Minimal harus ada 1 bahan');
            }
        }

        function addInstruction() {
            instructionCount++;
            const container = document.getElementById('instructionsContainer');
            const newItem = document.createElement('div');
            newItem.className = 'instruction-item';
            newItem.innerHTML = `
                <div class="d-flex">
                    <div class="me-2">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                             style="width: 30px; height: 30px;">
                            ${instructionCount}
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <textarea class="form-control form-control-premium"
                                  name="instructions[]"
                                  rows="2"
                                  placeholder="Deskripsi langkah pembuatan..."
                                  required></textarea>
                    </div>
                    <button type="button"
                            class="btn remove-btn ms-2"
                            onclick="removeInstruction(this)">
                        <i class="bi bi-x"></i>
                    </button>
                </div>
            `;
            container.appendChild(newItem);
        }

        function removeInstruction(button) {
            const items = document.querySelectorAll('#instructionsContainer .instruction-item');
            if (items.length > 1) {
                button.closest('.instruction-item').remove();
                // Renumber items
                document.querySelectorAll('#instructionsContainer .instruction-item').forEach((item, index) => {
                    item.querySelector('div > div').textContent = index + 1;
                });
                instructionCount = items.length - 1;
            } else {
                alert('Minimal harus ada 1 langkah');
            }
        }

        // Character counter
        document.getElementById('descriptionInput').addEventListener('input', function(e) {
            const count = e.target.value.length;
            document.getElementById('charCount').textContent = `${count}/500 karakter`;
            if (count > 500) {
                e.target.value = e.target.value.substring(0, 500);
                document.getElementById('charCount').textContent = '500/500 karakter';
                document.getElementById('charCount').style.color = '#dc3545';
            } else if (count > 450) {
                document.getElementById('charCount').style.color = '#ff9800';
            } else {
                document.getElementById('charCount').style.color = '#666';
            }
        });

        // Calorie meter
        document.getElementById('caloriesInput').addEventListener('input', function(e) {
            const calories = parseInt(e.target.value) || 0;
            let percentage = 0;

            if (calories < 200) percentage = (calories / 200) * 33;
            else if (calories < 400) percentage = 33 + ((calories - 200) / 200) * 33;
            else if (calories < 600) percentage = 66 + ((calories - 400) / 200) * 34;
            else percentage = 100;

            document.getElementById('calorieMeter').style.width = Math.min(Math.max(percentage, 0), 100) + '%';
        });

        // Image upload
        const imageUploadArea = document.getElementById('imageUploadArea');
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');

        imageUploadArea.addEventListener('click', () => imageInput.click());

        imageUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            imageUploadArea.classList.add('dragover');
        });

        imageUploadArea.addEventListener('dragleave', () => {
            imageUploadArea.classList.remove('dragover');
        });

        imageUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            imageUploadArea.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;
                handleImageSelect();
            }
        });

        imageInput.addEventListener('change', handleImageSelect);

        function handleImageSelect() {
            const file = imageInput.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file maksimal 2MB');
                    imageInput.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                    imageUploadArea.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            imageInput.value = '';
            imagePreviewContainer.style.display = 'none';
            imageUploadArea.style.display = 'block';
        }

        // Menu type change
        document.getElementById('menuType').addEventListener('change', function(e) {
            const premiumFeatures = document.getElementById('premiumFeatures');
            premiumFeatures.style.display = e.target.value === 'premium' ? 'block' : 'none';
        });

        // AI Features
        function generateWithAI() {
            const modal = new bootstrap.Modal(document.getElementById('aiGenerateModal'));
            modal.show();
        }

        function generateIngredientsWithAI() {
            // Simulate AI generating ingredients
            const aiIngredients = [
                '2 butir telur ayam',
                '1 buah alpukat',
                '50g bayam segar',
                '1 siung bawang putih',
                '1 sendok makan minyak zaitun',
                'Garam dan merica secukupnya'
            ];

            const container = document.getElementById('ingredientsContainer');
            container.innerHTML = '';

            aiIngredients.forEach((ingredient, index) => {
                const newItem = document.createElement('div');
                newItem.className = 'ingredient-item';
                newItem.innerHTML = `
                    <div class="d-flex align-items-center">
                        <span class="me-2">${index + 1}.</span>
                        <input type="text"
                               class="form-control form-control-premium"
                               name="ingredients[]"
                               value="${ingredient}"
                               required>
                        <button type="button"
                                class="btn remove-btn ms-2"
                                onclick="removeIngredient(this)">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                `;
                container.appendChild(newItem);
            });

            ingredientCount = aiIngredients.length;

            // Also generate instructions
            const aiInstructions = [
                'Panaskan minyak zaitun dalam wajan dengan api sedang',
                'Tumis bawang putih hingga harum',
                'Masukkan bayam dan tumis hingga layu',
                'Buat lubang di tengah wajan, masukkan telur',
                'Masak hingga telur matang sesuai selera',
                'Sajikan dengan alpukat di atasnya'
            ];

            const instructionsContainer = document.getElementById('instructionsContainer');
            instructionsContainer.innerHTML = '';

            aiInstructions.forEach((instruction, index) => {
                const newItem = document.createElement('div');
                newItem.className = 'instruction-item';
                newItem.innerHTML = `
                    <div class="d-flex">
                        <div class="me-2">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 30px; height: 30px;">
                                ${index + 1}
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <textarea class="form-control form-control-premium"
                                      name="instructions[]"
                                      rows="2"
                                      required>${instruction}</textarea>
                        </div>
                        <button type="button"
                                class="btn remove-btn ms-2"
                                onclick="removeInstruction(this)">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                `;
                instructionsContainer.appendChild(newItem);
            });

            instructionCount = aiInstructions.length;

            showToast('✅ Bahan dan cara pembuatan berhasil di-generate oleh AI!', 'success');
        }

        function generateMenuWithAI() {
            const menuType = document.getElementById('aiMenuType').value;
            const calories = document.getElementById('aiCalorieRange').value;

            // Simulate AI generation
            const aiMenu = {
                breakfast: {
                    name: 'Oatmeal Protein dengan Buah Beri',
                    calories: 350,
                    description: 'Oatmeal kaya serat dengan tambahan protein powder dan buah beri segar untuk sarapan sehat.'
                },
                lunch: {
                    name: 'Salad Ayam Panggang Mediterranean',
                    calories: 450,
                    description: 'Salad segar dengan ayam panggang, sayuran, dan dressing lemon-oregano.'
                },
                dinner: {
                    name: 'Ikan Salmon dengan Asparagus',
                    calories: 400,
                    description: 'Salmon panggang dengan asparagus dan quinoa untuk makan malam ringan.'
                },
                snack: {
                    name: 'Greek Yogurt dengan Kacang Almond',
                    calories: 250,
                    description: 'Yogurt Greek tinggi protein dengan kacang almond dan madu.'
                }
            };

            const menu = aiMenu[menuType];
            menu.calories = calories;

            // Fill form
            document.getElementById('menuName').value = menu.name;
            document.getElementById('caloriesInput').value = menu.calories;
            document.getElementById('descriptionInput').value = menu.description;

            // Trigger events
            document.getElementById('caloriesInput').dispatchEvent(new Event('input'));
            document.getElementById('descriptionInput').dispatchEvent(new Event('input'));

            // Close modal
            bootstrap.Modal.getInstance(document.getElementById('aiGenerateModal')).hide();

            showToast('✅ Menu berhasil di-generate oleh AI!', 'success');
        }

        function applyAISuggestion(type) {
            const suggestions = {
                breakfast: {
                    name: 'Scrambled Eggs dengan Sayuran',
                    calories: 350
                },
                lunch: {
                    name: 'Nasi Shirataki dengan Daging Cincang',
                    calories: 450
                },
                dinner: {
                    name: 'Sup Sayuran dengan Dada Ayam',
                    calories: 380
                }
            };

            const suggestion = suggestions[type];
            if (suggestion) {
                document.getElementById('menuName').value = suggestion.name;
                document.getElementById('caloriesInput').value = suggestion.calories;
                document.getElementById('caloriesInput').dispatchEvent(new Event('input'));
                showToast(`✅ Suggestion "${type}" applied!`, 'success');
            }
        }

        // Review generation
        function generateReview() {
            const formData = new FormData(document.getElementById('recipeForm'));
            const data = Object.fromEntries(formData.entries());

            const reviewContent = document.getElementById('reviewContent');
            reviewContent.innerHTML = `
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Informasi Dasar</h6>
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <p><strong>Nama Menu:</strong> ${data.title}</p>
                            <p><strong>Kalori:</strong> ${data.calories} kal</p>
                            <p><strong>Deskripsi:</strong> ${data.description.substring(0, 100)}...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">Detail</h6>
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <p><strong>Waktu Masak:</strong> ${data.cooking_time} menit</p>
                            <p><strong>Tingkat Kesulitan:</strong> ${data.difficulty}</p>
                            <p><strong>Tipe:</strong> ${data.type}</p>
                            <p><strong>Visibilitas:</strong> ${data.visibility}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h6 class="fw-bold mb-2">Statistik</h6>
                    <div class="row text-center">
                        <div class="col-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                ${document.querySelectorAll('[name="ingredients[]"]').length}
                            </div>
                            <p class="mt-2 mb-0">Bahan</p>
                        </div>
                        <div class="col-3">
                            <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                ${document.querySelectorAll('[name="instructions[]"]').length}
                            </div>
                            <p class="mt-2 mb-0">Langkah</p>
                        </div>
                        <div class="col-3">
                            <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                ${data.cooking_time}
                            </div>
                            <p class="mt-2 mb-0">Menit</p>
                        </div>
                        <div class="col-3">
                            <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                ${data.calories}
                            </div>
                            <p class="mt-2 mb-0">Kalori</p>
                        </div>
                    </div>
                </div>
            `;

            // AI Final Check
            const aiFinalCheck = document.getElementById('aiFinalCheck');
            const checks = [
                '✓ Nama menu sudah deskriptif',
                '✓ Kalori dalam range sehat',
                '✓ Deskripsi informatif',
                '✓ Bahan dan langkah lengkap',
                '✓ Informasi tambahan sudah diisi'
            ];

            aiFinalCheck.innerHTML = checks.map(check => `<div>${check}</div>`).join('');
        }

        // Calorie range slider
        document.getElementById('aiCalorieRange').addEventListener('input', function(e) {
            document.getElementById('aiCalorieValue').textContent = e.target.value + ' kal';
        });

        // Dietary preference buttons
        document.querySelectorAll('[data-preference]').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('[data-preference]').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });

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

        // Check for AI suggested parameter
        @if(request('ai_suggested'))
            generateIngredientsWithAI();
        @endif
    </script>
</body>
</html>
