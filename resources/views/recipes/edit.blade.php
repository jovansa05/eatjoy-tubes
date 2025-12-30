<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $recipe->title }} | EatJoy Premium+</title>
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
            --gradient-warning: linear-gradient(135deg, #FF9800, #F57C00);
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

        .edit-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(156, 39, 176, 0.15);
            overflow: hidden;
            margin-top: 30px;
            border: 1px solid rgba(156, 39, 176, 0.1);
            position: relative;
        }

        .edit-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-warning);
        }

        .edit-header {
            background: linear-gradient(135deg, #FF9800, #F57C00);
            color: white;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .edit-header::after {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        .edit-stepper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: rgba(156, 39, 176, 0.05);
            border-bottom: 1px solid rgba(156, 39, 176, 0.1);
        }

        .step {
            display: flex;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .step:not(:last-child)::after {
            content: '';
            flex: 1;
            height: 2px;
            background: rgba(156, 39, 176, 0.2);
            margin: 0 15px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(156, 39, 176, 0.1);
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .step.active .step-circle {
            background: var(--gradient);
            color: white;
            border-color: white;
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.4);
            transform: scale(1.1);
        }

        .step.completed .step-circle {
            background: #4CAF50;
            color: white;
        }

        .step-label {
            margin-left: 10px;
            font-weight: 500;
            color: #666;
            transition: all 0.3s;
        }

        .step.active .step-label {
            color: var(--primary);
            font-weight: 600;
        }

        .form-section {
            padding: 30px;
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(156, 39, 176, 0.1);
            position: relative;
        }

        .section-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 80px;
            height: 2px;
            background: var(--gradient);
        }

        .form-label-premium {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label-premium i {
            margin-right: 8px;
            color: var(--primary);
        }

        .form-control-premium {
            border: 2px solid rgba(156, 39, 176, 0.1);
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s;
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        .form-control-premium:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(156, 39, 176, 0.1);
            transform: translateY(-1px);
        }

        .input-group-premium {
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-radius: 12px;
            overflow: hidden;
        }

        .input-group-premium .input-group-text {
            background: rgba(156, 39, 176, 0.05);
            border: 2px solid rgba(156, 39, 176, 0.1);
            color: var(--primary);
            font-weight: 500;
        }

        .ingredient-item, .instruction-item {
            background: white;
            border: 2px solid rgba(156, 39, 176, 0.1);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .ingredient-item::before, .instruction-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient);
        }

        .ingredient-item:hover, .instruction-item:hover {
            transform: translateX(5px);
            box-shadow: 0 10px 25px rgba(156, 39, 176, 0.1);
            border-color: rgba(156, 39, 176, 0.2);
        }

        .remove-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFEBEE;
            color: #F44336;
            border: 2px solid #FFCDD2;
            transition: all 0.3s;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .remove-btn:hover {
            background: #F44336;
            color: white;
            transform: rotate(90deg) scale(1.1);
            border-color: #F44336;
            box-shadow: 0 5px 15px rgba(244, 67, 54, 0.3);
        }

        .add-btn {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(103, 58, 183, 0.1));
            color: var(--primary);
            border: 2px dashed rgba(156, 39, 176, 0.3);
            border-radius: 12px;
            padding: 15px;
            width: 100%;
            font-weight: 500;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-btn:hover {
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.2), rgba(103, 58, 183, 0.2));
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(156, 39, 176, 0.2);
        }

        .image-upload-area {
            border: 3px dashed rgba(156, 39, 176, 0.3);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            background: linear-gradient(135deg, rgba(243, 229, 245, 0.3), rgba(225, 190, 231, 0.3));
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .image-upload-area:hover {
            border-color: var(--primary);
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.1), rgba(103, 58, 183, 0.1));
            transform: translateY(-2px);
        }

        .image-upload-area.dragover {
            border-color: var(--primary);
            background: linear-gradient(135deg, rgba(156, 39, 176, 0.2), rgba(103, 58, 183, 0.2));
        }

        .current-image {
            border-radius: 15px;
            border: 3px solid white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .current-image:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .ai-assist-btn {
            background: var(--gradient-accent);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .ai-assist-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 188, 212, 0.3);
            color: white;
        }

        .preview-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 2px solid rgba(156, 39, 176, 0.1);
            transition: all 0.3s;
        }

        .preview-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(156, 39, 176, 0.1);
            border-color: rgba(156, 39, 176, 0.2);
        }

        .calorie-meter {
            height: 10px;
            background: rgba(156, 39, 176, 0.1);
            border-radius: 5px;
            overflow: hidden;
            margin-top: 10px;
        }

        .calorie-fill {
            height: 100%;
            background: var(--gradient);
            border-radius: 5px;
            transition: width 1s ease;
        }

        .navigation-buttons {
            padding: 25px 30px;
            background: rgba(156, 39, 176, 0.03);
            border-top: 1px solid rgba(156, 39, 176, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-premium {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 12px;
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

        .btn-premium::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .ai-suggestion-box {
            background: linear-gradient(135deg, #E0F7FA, #B2EBF2);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            border-left: 5px solid var(--accent);
            position: relative;
            overflow: hidden;
        }

        .ai-suggestion-box::before {
            content: '🤖';
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 2rem;
            opacity: 0.2;
        }

        .badge-premium {
            background: var(--gradient);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(156, 39, 176, 0.3);
        }

        .char-counter {
            font-size: 0.8rem;
            color: #666;
            transition: color 0.3s;
        }

        .char-counter.warning {
            color: #FF9800;
        }

        .char-counter.danger {
            color: #F44336;
        }

        .feature-tag {
            display: inline-block;
            background: rgba(156, 39, 176, 0.1);
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-right: 8px;
            margin-bottom: 8px;
            border: 1px solid rgba(156, 39, 176, 0.2);
            transition: all 0.3s;
        }

        .feature-tag:hover {
            background: rgba(156, 39, 176, 0.2);
            transform: translateY(-2px);
        }

        .ingredient-count, .instruction-count {
            background: var(--gradient);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-left: 10px;
            box-shadow: 0 4px 10px rgba(156, 39, 176, 0.3);
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
                <span class="badge-premium ms-2">
                    <i class="bi bi-stars me-1"></i>EDIT PREMIUM RECIPE
                </span>
            </div>

            <div class="d-flex align-items-center">
                <div class="me-3 d-none d-md-block">
                    <small class="text-muted">Editing:</small>
                    <div class="fw-bold">{{ Str::limit($recipe->title, 20) }}</div>
                </div>

                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-outline-primary me-2">
                    <i class="bi bi-eye me-1"></i>Preview
                </a>

                <a href="{{ route('recipes.my') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i>Cancel
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Edit Container -->
        <div class="edit-container">
            <!-- Edit Header -->
            <div class="edit-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h1 class="display-6 fw-bold mb-2">
                            <i class="bi bi-pencil-square me-2"></i>
                            Edit Recipe
                        </h1>
                        <p class="mb-0 opacity-90">
                            Refine your premium recipe with AI assistance
                        </p>
                    </div>
                    <button class="ai-assist-btn" onclick="generateWithAI()">
                        <i class="bi bi-magic me-2"></i>AI Assist
                    </button>
                </div>
            </div>

            <!-- Stepper -->
            <div class="edit-stepper">
                <div class="step active" id="step1Btn">
                    <div class="step-circle">1</div>
                    <div class="step-label">Basic Info</div>
                </div>
                <div class="step" id="step2Btn">
                    <div class="step-circle">2</div>
                    <div class="step-label">Ingredients</div>
                </div>
                <div class="step" id="step3Btn">
                    <div class="step-circle">3</div>
                    <div class="step-label">Instructions</div>
                </div>
                <div class="step" id="step4Btn">
                    <div class="step-circle">4</div>
                    <div class="step-label">Details</div>
                </div>
                <div class="step" id="step5Btn">
                    <div class="step-circle">5</div>
                    <div class="step-label">Review</div>
                </div>
            </div>

            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data" id="recipeForm">
                @csrf
                @method('PUT')

                <!-- Step 1: Basic Information -->
                <div class="form-section active" id="step1Content">
                    <div class="section-header">
                        <h3 class="fw-bold mb-2">
                            <i class="bi bi-info-circle me-2" style="color: var(--primary);"></i>
                            Basic Information
                        </h3>
                        <p class="text-muted mb-0">Set up the foundation of your recipe</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-card-heading"></i>Recipe Title
                            </label>
                            <input type="text"
                                   class="form-control form-control-premium"
                                   name="title"
                                   value="{{ old('title', $recipe->title) }}"
                                   placeholder="Enter your recipe name..."
                                   required
                                   id="recipeTitle">
                            <div class="text-end mt-2">
                                <small class="char-counter" id="titleCounter">0/60 characters</small>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-fire"></i>Calories
                            </label>
                            <div class="input-group-premium">
                                <input type="number"
                                       class="form-control form-control-premium"
                                       name="calories"
                                       value="{{ old('calories', $recipe->calories) }}"
                                       min="1"
                                       max="5000"
                                       required
                                       id="caloriesInput">
                                <span class="input-group-text">kcal</span>
                            </div>
                            <div class="calorie-meter">
                                <div class="calorie-fill" id="calorieFill"></div>
                            </div>
                            <small class="text-muted mt-1 d-block">
                                <i class="bi bi-info-circle me-1"></i>
                                Recommended: 300-600 kcal per serving
                            </small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label-premium">
                            <i class="bi bi-text-paragraph"></i>Description
                        </label>
                        <textarea class="form-control form-control-premium"
                                  name="description"
                                  rows="4"
                                  placeholder="Describe your recipe... What makes it special?"
                                  required
                                  id="descriptionInput">{{ old('description', $recipe->description) }}</textarea>
                        <div class="text-end mt-2">
                            <small class="char-counter" id="descCounter">0/500 characters</small>
                        </div>
                    </div>

                    <!-- AI Suggestion -->
                    <div class="ai-suggestion-box">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-robot me-3 mt-1" style="color: var(--accent);"></i>
                            <div>
                                <h6 class="fw-bold mb-2">💡 AI Suggestion</h6>
                                <p class="mb-0">
                                    Use descriptive titles like "Creamy Garlic Parmesan Chicken"
                                    and mention key benefits like "high-protein" or "low-carb".
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Ingredients -->
                <div class="form-section" id="step2Content">
                    <div class="section-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-2">
                                    <i class="bi bi-list-check me-2" style="color: var(--primary);"></i>
                                    Ingredients
                                </h3>
                                <p class="text-muted mb-0">List all ingredients needed</p>
                            </div>
                            <div>
                                <button type="button" class="ai-assist-btn" onclick="generateIngredientsAI()">
                                    <i class="bi bi-robot me-2"></i>AI Generate
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="ingredientsContainer">
                        @foreach(old('ingredients', $recipe->ingredients ?? []) as $index => $ingredient)
                        <div class="ingredient-item">
                            <div class="d-flex align-items-center">
                                <div class="me-3 fw-bold text-primary" style="min-width: 30px;">
                                    {{ $index + 1 }}.
                                </div>
                                <input type="text"
                                       class="form-control form-control-premium border-0 bg-transparent"
                                       name="ingredients[]"
                                       value="{{ $ingredient }}"
                                       placeholder="e.g., 2 tablespoons olive oil"
                                       required>
                                <button type="button" class="remove-btn" onclick="removeIngredient(this)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="add-btn mt-3" onclick="addIngredient()">
                        <i class="bi bi-plus-circle me-2"></i>Add Ingredient
                    </button>

                    <!-- Ingredient Tips -->
                    <div class="mt-4">
                        <h6 class="fw-bold mb-3">🎯 Pro Tips</h6>
                        <div class="d-flex flex-wrap">
                            <span class="feature-tag">
                                <i class="bi bi-rulers me-1"></i>Include measurements
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-thermometer me-1"></i>Specify temperature
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-clock me-1"></i>Note preparation time
                            </span>
                            <span class="feature-tag">
                                <i class="bi bi-star me-1"></i>Use fresh ingredients
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Instructions -->
                <div class="form-section" id="step3Content">
                    <div class="section-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bold mb-2">
                                    <i class="bi bi-list-ol me-2" style="color: var(--primary);"></i>
                                    Cooking Instructions
                                </h3>
                                <p class="text-muted mb-0">Step-by-step cooking guide</p>
                            </div>
                            <div>
                                <button type="button" class="ai-assist-btn" onclick="generateInstructionsAI()">
                                    <i class="bi bi-robot me-2"></i>AI Generate
                                </button>
                            </div>
                        </div>
                    </div>

                    <div id="instructionsContainer">
                        @foreach(old('instructions', $recipe->instructions ?? []) as $index => $instruction)
                        <div class="instruction-item">
                            <div class="d-flex">
                                <div class="me-3">
                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                         style="width: 40px; height: 40px;">
                                        {{ $index + 1 }}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <label class="form-label-premium mb-1">Step {{ $index + 1 }}</label>
                                    <textarea class="form-control form-control-premium"
                                              name="instructions[]"
                                              rows="3"
                                              placeholder="Describe this step in detail..."
                                              required>{{ $instruction }}</textarea>
                                </div>
                                <button type="button" class="remove-btn" onclick="removeInstruction(this)">
                                    <i class="bi bi-x"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="add-btn mt-3" onclick="addInstruction()">
                        <i class="bi bi-plus-circle me-2"></i>Add Step
                    </button>

                    <!-- Cooking Tips -->
                    <div class="ai-suggestion-box mt-4">
                        <h6 class="fw-bold mb-2">
                            <i class="bi bi-lightbulb me-2"></i>AI Cooking Tips
                        </h6>
                        <ul class="mb-0">
                            <li>Start with preparation steps (chopping, measuring)</li>
                            <li>Include cooking times and temperatures</li>
                            <li>Mention visual cues (e.g., "cook until golden brown")</li>
                            <li>Add serving suggestions at the end</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 4: Additional Details -->
                <div class="form-section" id="step4Content">
                    <div class="section-header">
                        <h3 class="fw-bold mb-2">
                            <i class="bi bi-gear me-2" style="color: var(--primary);"></i>
                            Additional Details
                        </h3>
                        <p class="text-muted mb-0">Fine-tune your recipe settings</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-clock"></i>Cooking Time
                            </label>
                            <div class="input-group-premium">
                                <input type="number"
                                       class="form-control form-control-premium"
                                       name="cooking_time"
                                       value="{{ old('cooking_time', $recipe->cooking_time) }}"
                                       min="1"
                                       max="480"
                                       required>
                                <span class="input-group-text">minutes</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-bar-chart"></i>Difficulty Level
                            </label>
                            <select class="form-select form-control-premium" name="difficulty" required>
                                <option value="easy" {{ old('difficulty', $recipe->difficulty) == 'easy' ? 'selected' : '' }}>Easy</option>
                                <option value="medium" {{ old('difficulty', $recipe->difficulty) == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="hard" {{ old('difficulty', $recipe->difficulty) == 'hard' ? 'selected' : '' }}>Hard</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-star"></i>Recipe Type
                            </label>
                            <select class="form-select form-control-premium" name="type" required id="recipeType">
                                <option value="regular" {{ old('type', $recipe->type) == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="premium" {{ old('type', $recipe->type) == 'premium' ? 'selected' : '' }}>Premium</option>
                            </select>
                            <div class="mt-2" id="premiumInfo" style="{{ $recipe->type == 'premium' ? '' : 'display: none;' }}">
                                <small class="text-warning">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Premium recipes are featured prominently and accessible to all premium users
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">
                                <i class="bi bi-eye"></i>Visibility
                            </label>
                            <select class="form-select form-control-premium" name="visibility" required>
                                <option value="public" {{ old('visibility', $recipe->visibility) == 'public' ? 'selected' : '' }}>Public (Visible to everyone)</option>
                                <option value="private" {{ old('visibility', $recipe->visibility) == 'private' ? 'selected' : '' }}>Private (Only visible to you)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label class="form-label-premium">
                            <i class="bi bi-image"></i>Recipe Image
                        </label>

                        @if($recipe->image)
                        <div class="mb-3">
                            <p class="text-muted small mb-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $recipe->image) }}"
                                 class="current-image"
                                 style="max-height: 200px;">
                        </div>
                        @endif

                        <div class="image-upload-area" id="imageUploadArea">
                            <i class="bi bi-cloud-arrow-up display-4 mb-3" style="color: rgba(156, 39, 176, 0.3);"></i>
                            <p class="fw-bold mb-1">Upload new recipe image</p>
                            <p class="text-muted small mb-3">Drag & drop or click to browse</p>
                            <input type="file"
                                   class="form-control d-none"
                                   name="image"
                                   id="imageInput"
                                   accept="image/*">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('imageInput').click()">
                                <i class="bi bi-folder2-open me-1"></i>Choose File
                            </button>
                            <p class="text-muted small mt-2">JPG, PNG, GIF (Max 5MB)</p>
                        </div>
                        <div class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
                            <img id="imagePreview" class="current-image">
                            <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeImagePreview()">
                                <i class="bi bi-trash me-1"></i>Remove Image
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 5: Review & Submit -->
                <div class="form-section" id="step5Content">
                    <div class="section-header">
                        <h3 class="fw-bold mb-2">
                            <i class="bi bi-check-circle me-2" style="color: #4CAF50;"></i>
                            Review & Submit
                        </h3>
                        <p class="text-muted mb-0">Preview your recipe before publishing</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Recipe Preview -->
                            <div classpreview-card>
                                <div class="text-center mb-4">
                                    <div class="badge-premium mb-2">
                                        <i class="bi bi-eye me-1"></i>Preview
                                    </div>
                                    <h4 id="previewTitle">{{ $recipe->title }}</h4>
                                </div>

                                <div class="row text-center mb-4">
                                    <div class="col-4">
                                        <div class="value fw-bold" id="previewCalories">{{ $recipe->calories }}</div>
                                        <small class="text-muted">Calories</small>
                                    </div>
                                    <div class="col-4">
                                        <div class="value fw-bold" id="previewTime">{{ $recipe->cooking_time }}</div>
                                        <small class="text-muted">Minutes</small>
                                    </div>
                                    <div class="col-4">
                                        <div class="value fw-bold" id="previewDifficulty">
                                            {{ ucfirst($recipe->difficulty) }}
                                        </div>
                                        <small class="text-muted">Difficulty</small>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h6 class="fw-bold">Description</h6>
                                    <p class="text-muted" id="previewDescription">{{ Str::limit($recipe->description, 150) }}</p>
                                </div>

                                <div class="mb-3">
                                    <h6 class="fw-bold">Ingredients <span class="ingredient-count" id="previewIngCount">{{ count($recipe->ingredients) }}</span></h6>
                                    <ul class="small" id="previewIngredients">
                                        @foreach($recipe->ingredients as $ingredient)
                                        <li>{{ Str::limit($ingredient, 30) }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- AI Final Check -->
                            <div class="ai-suggestion-box">
                                <div class="text-center mb-3">
                                    <i class="bi bi-robot display-4" style="color: var(--accent);"></i>
                                </div>
                                <h5 class="fw-bold text-center mb-3">AI Quality Check</h5>

                                <div id="aiCheckResults">
                                    <!-- AI check results will appear here -->
                                </div>

                                <button type="button" class="btn-ai w-100 mt-3" onclick="runAICheck()">
                                    <i class="bi bi-robot me-2"></i>Run AI Quality Check
                                </button>
                            </div>

                            <!-- Final Notes -->
                            <div class="mt-4">
                                <div class="alert alert-warning">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    <strong>Premium Feature:</strong> Your recipe will be reviewed by our AI system
                                    for quality and nutritional accuracy before publishing.
                                </div>

                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                    <label class="form-check-label small" for="termsCheck">
                                        I confirm that this recipe is original and follows our community guidelines
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons">
                    <div>
                        <button type="button" class="btn btn-outline-secondary" id="prevBtn">
                            <i class="bi bi-arrow-left me-1"></i>Previous
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn-premium" id="nextBtn">
                            Next <i class="bi bi-arrow-right ms-1"></i>
                        </button>
                        <button type="submit" class="btn-premium" id="submitBtn" style="display: none;">
                            <i class="bi bi-check-circle me-1"></i>Update Recipe
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Quick Tips Sidebar -->
        <div class="mt-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-lightbulb me-2" style="color: var(--accent);"></i>
                        Premium Editing Tips
                    </h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="bi bi-camera display-4 mb-3" style="color: var(--primary);"></i>
                                <h6>High-Quality Images</h6>
                                <small class="text-muted">Use bright, well-lit photos</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="bi bi-list-ol display-4 mb-3" style="color: var(--accent);"></i>
                                <h6>Clear Instructions</h6>
                                <small class="text-muted">Break into logical steps</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center p-3">
                                <i class="bi bi-graph-up display-4 mb-3" style="color: #4CAF50;"></i>
                                <h6>Nutrition Focus</h6>
                                <small class="text-muted">Highlight health benefits</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Multi-step form functionality
        let currentStep = 1;
        const totalSteps = 5;
        const steps = ['step1', 'step2', 'step3', 'step4', 'step5'];

        function showStep(step) {
            // Hide all steps
            steps.forEach(s => {
                document.getElementById(s + 'Content').classList.remove('active');
                document.getElementById(s + 'Btn').classList.remove('active');
            });

            // Show current step
            document.getElementById(steps[step - 1] + 'Content').classList.add('active');
            document.getElementById(steps[step - 1] + 'Btn').classList.add('active');

            // Mark previous steps as completed
            for (let i = 0; i < step - 1; i++) {
                document.getElementById(steps[i] + 'Btn').classList.add('completed');
            }

            // Update buttons
            document.getElementById('prevBtn').style.display = step > 1 ? 'inline-block' : 'none';
            document.getElementById('nextBtn').style.display = step < totalSteps ? 'inline-block' : 'none';
            document.getElementById('submitBtn').style.display = step === totalSteps ? 'inline-block' : 'none';

            // Update preview if on review step
            if (step === 5) {
                updatePreview();
            }
        }

        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < totalSteps) {
                    currentStep++;
                    showStep(currentStep);
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
            let message = '';

            switch(step) {
                case 1:
                    const title = document.getElementById('recipeTitle').value.trim();
                    const calories = document.getElementById('caloriesInput').value;
                    const description = document.getElementById('descriptionInput').value.trim();

                    if (!title || title.length < 3) {
                        message = 'Recipe title must be at least 3 characters';
                        isValid = false;
                    } else if (!calories || calories < 1 || calories > 5000) {
                        message = 'Please enter a valid calorie amount (1-5000)';
                        isValid = false;
                    } else if (!description || description.length < 10) {
                        message = 'Description must be at least 10 characters';
                        isValid = false;
                    }
                    break;

                case 2:
                    const ingredients = document.querySelectorAll('[name="ingredients[]"]');
                    let ingredientsValid = true;
                    ingredients.forEach(input => {
                        if (!input.value.trim()) ingredientsValid = false;
                    });

                    if (!ingredientsValid || ingredients.length === 0) {
                        message = 'Please add at least one ingredient';
                        isValid = false;
                    }
                    break;

                case 3:
                    const instructions = document.querySelectorAll('[name="instructions[]"]');
                    let instructionsValid = true;
                    instructions.forEach(textarea => {
                        if (!textarea.value.trim()) instructionsValid = false;
                    });

                    if (!instructionsValid || instructions.length === 0) {
                        message = 'Please add at least one instruction step';
                        isValid = false;
                    }
                    break;
            }

            if (!isValid && message) {
                showToast('⚠️ ' + message, 'warning');
            }

            return isValid;
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            showStep(1);
            document.getElementById('nextBtn').addEventListener('click', nextStep);
            document.getElementById('prevBtn').addEventListener('click', prevStep);

            // Set up step click handlers
            steps.forEach((step, index) => {
                document.getElementById(step + 'Btn').addEventListener('click', () => {
                    if (index + 1 <= currentStep) {
                        currentStep = index + 1;
                        showStep(currentStep);
                    }
                });
            });

            // Initialize counters
            updateTitleCounter();
            updateDescriptionCounter();
            updateCalorieMeter();
        });

        // Dynamic ingredients
        let ingredientCount = {{ count($recipe->ingredients ?? []) }};
        let instructionCount = {{ count($recipe->instructions ?? []) }};

        function addIngredient() {
            ingredientCount++;
            const container = document.getElementById('ingredientsContainer');
            const newItem = document.createElement('div');
            newItem.className = 'ingredient-item';
            newItem.innerHTML = `
                <div class="d-flex align-items-center">
                    <div class="me-3 fw-bold text-primary" style="min-width: 30px;">
                        ${ingredientCount}.
                    </div>
                    <input type="text"
                           class="form-control form-control-premium border-0 bg-transparent"
                           name="ingredients[]"
                           placeholder="e.g., ${ingredientCount} cup flour"
                           required>
                    <button type="button" class="remove-btn" onclick="removeIngredient(this)">
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
                    item.querySelector('div > div').textContent = `${index + 1}.`;
                });
                ingredientCount = items.length - 1;
            } else {
                showToast('⚠️ At least one ingredient is required', 'warning');
            }
        }

        function addInstruction() {
            instructionCount++;
            const container = document.getElementById('instructionsContainer');
            const newItem = document.createElement('div');
            newItem.className = 'instruction-item';
            newItem.innerHTML = `
                <div class="d-flex">
                    <div class="me-3">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold"
                             style="width: 40px; height: 40px;">
                            ${instructionCount}
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <label class="form-label-premium mb-1">Step ${instructionCount}</label>
                        <textarea class="form-control form-control-premium"
                                  name="instructions[]"
                                  rows="3"
                                  placeholder="Describe this step in detail..."
                                  required></textarea>
                    </div>
                    <button type="button" class="remove-btn" onclick="removeInstruction(this)">
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
                // Renumber steps
                document.querySelectorAll('#instructionsContainer .instruction-item').forEach((item, index) => {
                    item.querySelector('div > div').textContent = index + 1;
                    item.querySelector('label').textContent = `Step ${index + 1}`;
                });
                instructionCount = items.length - 1;
            } else {
                showToast('⚠️ At least one instruction step is required', 'warning');
            }
        }

        // Character counters
        function updateTitleCounter() {
            const input = document.getElementById('recipeTitle');
            const counter = document.getElementById('titleCounter');
            const length = input.value.length;
            counter.textContent = `${length}/60 characters`;
            counter.className = 'char-counter' + (length > 50 ? ' warning' : '') + (length > 60 ? ' danger' : '');
        }

        function updateDescriptionCounter() {
            const textarea = document.getElementById('descriptionInput');
            const counter = document.getElementById('descCounter');
            const length = textarea.value.length;
            counter.textContent = `${length}/500 characters`;
            counter.className = 'char-counter' + (length > 450 ? ' warning' : '') + (length > 500 ? ' danger' : '');
        }

        // Calorie meter
        function updateCalorieMeter() {
            const input = document.getElementById('caloriesInput');
            const fill = document.getElementById('calorieFill');
            const calories = parseInt(input.value) || 0;

            let percentage = 0;
            if (calories < 200) percentage = (calories / 200) * 33;
            else if (calories < 400) percentage = 33 + ((calories - 200) / 200) * 33;
            else if (calories < 600) percentage = 66 + ((calories - 400) / 200) * 34;
            else percentage = 100;

            fill.style.width = Math.min(Math.max(percentage, 0), 100) + '%';
        }

        // Event listeners
        document.getElementById('recipeTitle').addEventListener('input', updateTitleCounter);
        document.getElementById('descriptionInput').addEventListener('input', updateDescriptionCounter);
        document.getElementById('caloriesInput').addEventListener('input', updateCalorieMeter);

        // Recipe type change
        document.getElementById('recipeType').addEventListener('change', function(e) {
            document.getElementById('premiumInfo').style.display = e.target.value === 'premium' ? 'block' : 'none';
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
                if (file.size > 5 * 1024 * 1024) {
                    showToast('⚠️ Image size should be less than 5MB', 'warning');
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

        function removeImagePreview() {
            imageInput.value = '';
            imagePreviewContainer.style.display = 'none';
            imageUploadArea.style.display = 'block';
        }

        // AI Features
        function generateWithAI() {
            showToast('🤖 Generating AI suggestions...', 'info');
            setTimeout(() => {
                // Simulate AI generation
                document.getElementById('recipeTitle').value = 'Creamy Garlic Parmesan Chicken';
                document.getElementById('caloriesInput').value = 450;
                document.getElementById('descriptionInput').value = 'A delicious and creamy chicken dish with garlic and parmesan cheese, perfect for a healthy dinner option.';

                updateTitleCounter();
                updateDescriptionCounter();
                updateCalorieMeter();

                showToast('✅ AI suggestions applied!', 'success');
            }, 1500);
        }

        function generateIngredientsAI() {
            const aiIngredients = [
                '2 chicken breasts, boneless and skinless',
                '3 cloves garlic, minced',
                '1 cup heavy cream',
                '1/2 cup grated parmesan cheese',
                '1 tablespoon olive oil',
                '1 teaspoon Italian seasoning',
                'Salt and pepper to taste',
                'Fresh parsley for garnish'
            ];

            const container = document.getElementById('ingredientsContainer');
            container.innerHTML = '';

            aiIngredients.forEach((ingredient, index) => {
                const newItem = document.createElement('div');
                newItem.className = 'ingredient-item';
                newItem.innerHTML = `
                    <div class="d-flex align-items-center">
                        <div class="me-3 fw-bold text-primary" style="min-width: 30px;">
                            ${index + 1}.
                        </div>
                        <input type="text"
                               class="form-control form-control-premium border-0 bg-transparent"
                               name="ingredients[]"
                               value="${ingredient}"
                               required>
                        <button type="button" class="remove-btn" onclick="removeIngredient(this)">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                `;
                container.appendChild(newItem);
            });

            ingredientCount = aiIngredients.length;
            showToast('✅ AI generated ingredients applied!', 'success');
        }

        function generateInstructionsAI() {
            const aiInstructions = [
                'Season chicken breasts with salt and pepper on both sides.',
                'Heat olive oil in a large skillet over medium-high heat.',
                'Add chicken breasts and cook for 5-6 minutes per side until golden brown and cooked through.',
                'Remove chicken from skillet and set aside.',
                'In the same skillet, add minced garlic and cook for 1 minute until fragrant.',
                'Pour in heavy cream and bring to a simmer.',
                'Stir in parmesan cheese until melted and sauce is smooth.',
                'Return chicken to skillet and spoon sauce over the top.',
                'Cook for 2-3 more minutes until heated through.',
                'Garnish with fresh parsley and serve immediately.'
            ];

            const container = document.getElementById('instructionsContainer');
            container.innerHTML = '';

            aiInstructions.forEach((instruction, index) => {
                const newItem = document.createElement('div');
                newItem.className = 'instruction-item';
                newItem.innerHTML = `
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 40px; height: 40px;">
                                ${index + 1}
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <label class="form-label-premium mb-1">Step ${index + 1}</label>
                            <textarea class="form-control form-control-premium"
                                      name="instructions[]"
                                      rows="3"
                                      required>${instruction}</textarea>
                        </div>
                        <button type="button" class="remove-btn" onclick="removeInstruction(this)">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                `;
                container.appendChild(newItem);
            });

            instructionCount = aiInstructions.length;
            showToast('✅ AI generated instructions applied!', 'success');
        }

        // Preview update
        function updatePreview() {
            document.getElementById('previewTitle').textContent = document.getElementById('recipeTitle').value;
            document.getElementById('previewCalories').textContent = document.getElementById('caloriesInput').value;
            document.getElementById('previewTime').textContent = document.querySelector('[name="cooking_time"]').value;
            document.getElementById('previewDifficulty').textContent = document.querySelector('[name="difficulty"]').value;
            document.getElementById('previewDescription').textContent = document.getElementById('descriptionInput').value;

            const ingredients = document.querySelectorAll('[name="ingredients[]"]');
            const ingredientList = document.getElementById('previewIngredients');
            ingredientList.innerHTML = '';
            ingredients.forEach(ing => {
                if (ing.value.trim()) {
                    const li = document.createElement('li');
                    li.textContent = ing.value;
                    ingredientList.appendChild(li);
                }
            });

            document.getElementById('previewIngCount').textContent = ingredients.length;
        }

        // AI Quality Check
        function runAICheck() {
            const aiCheckResults = document.getElementById('aiCheckResults');
            aiCheckResults.innerHTML = `
                <div class="text-center mb-3">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2">AI is analyzing your recipe...</p>
                </div>
            `;

            setTimeout(() => {
                const checks = [
                    { name: 'Title Quality', status: 'pass', message: 'Title is descriptive and appealing' },
                    { name: 'Nutrition Balance', status: 'pass', message: 'Calorie range is appropriate' },
                    { name: 'Ingredient Clarity', status: 'pass', message: 'Ingredients are well-specified' },
                    { name: 'Instruction Detail', status: 'warning', message: 'Consider adding more step details' },
                    { name: 'Image Quality', status: 'pending', message: 'Image recommended but not required' }
                ];

                let html = '';
                checks.forEach(check => {
                    const icon = check.status === 'pass' ? '✅' : check.status === 'warning' ? '⚠️' : '⏳';
                    const color = check.status === 'pass' ? 'text-success' : check.status === 'warning' ? 'text-warning' : 'text-secondary';

                    html += `
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <span class="${color} me-2">${icon}</span>
                                <span>${check.name}</span>
                            </div>
                            <small class="text-muted">${check.message}</small>
                        </div>
                    `;
                });

                aiCheckResults.innerHTML = html + `
                    <div class="alert alert-success mt-3">
                        <i class="bi bi-check-circle me-2"></i>
                        <strong>AI Score: 85/100</strong> - Your recipe is ready for publishing!
                    </div>
                `;
            }, 2000);
        }

        // Toast notification
        function showToast(message, type = 'info') {
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

        // Form submission
        document.getElementById('recipeForm').addEventListener('submit', function(e) {
            const terms = document.getElementById('termsCheck');
            if (!terms.checked) {
                e.preventDefault();
                showToast('⚠️ Please accept the terms and conditions', 'warning');
                return;
            }

            showToast('🔄 Updating recipe...', 'info');
        });
    </script>
</body>
</html>
