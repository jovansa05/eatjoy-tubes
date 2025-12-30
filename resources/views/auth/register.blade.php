<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - EatJoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #4A90E2;
            --accent: #FF6584;
            --success: #4CAF50;
            --light: #F8F9FF;
            --dark: #2D3436;
            --gradient: linear-gradient(135deg, #6C63FF 0%, #4A90E2 100%);
            --card-shadow: 0 20px 40px rgba(108, 99, 255, 0.15);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 800px;
        }

        .register-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .register-header {
            background: var(--gradient);
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .register-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.1) 0%, transparent 50%);
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.8rem;
        }

        .logo-text {
            font-size: 2.2rem;
            font-weight: 700;
            color: white;
        }

        .progress-steps {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin: 30px 0;
            position: relative;
            z-index: 2;
        }

        .step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 3px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            transition: all 0.3s;
        }

        .step.active .step-circle {
            background: white;
            color: var(--primary);
            box-shadow: 0 0 0 5px rgba(255, 255, 255, 0.2);
        }

        .step-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .step.active .step-label {
            color: white;
            font-weight: 600;
        }

        .register-body {
            padding: 40px;
        }

        .form-section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            color: var(--dark);
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-label i {
            color: var(--primary);
            font-size: 1.1rem;
        }

        .form-control {
            height: 48px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 0 15px;
            font-size: 1rem;
            transition: all 0.3s;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.1);
        }

        .form-text {
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
            display: block;
        }

        .row {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .row > div {
            flex: 1;
        }

        .weight-preview {
            background: linear-gradient(135deg, rgba(108, 99, 255, 0.05), rgba(74, 144, 226, 0.05));
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            border: 2px solid rgba(108, 99, 255, 0.1);
        }

        .weight-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .weight-item {
            text-align: center;
            flex: 1;
        }

        .weight-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .current-weight .weight-value {
            color: var(--primary);
        }

        .target-weight .weight-value {
            color: var(--success);
        }

        .difference-weight .weight-value {
            color: var(--accent);
        }

        .weight-label {
            font-size: 0.9rem;
            color: #666;
        }

        .motivation-card {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(46, 125, 50, 0.1));
            border: 2px solid rgba(76, 175, 80, 0.2);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .motivation-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .motivation-icon {
            font-size: 1.5rem;
            color: var(--success);
        }

        .motivation-text {
            flex: 1;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #eee;
        }

        .btn-prev {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            height: 50px;
            padding: 0 30px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
        }

        .btn-prev:hover {
            background: rgba(108, 99, 255, 0.1);
        }

        .btn-next {
            background: var(--gradient);
            color: white;
            border: none;
            height: 50px;
            padding: 0 30px;
            border-radius: 10px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(108, 99, 255, 0.4);
        }

        .btn-submit {
            background: var(--gradient);
            color: white;
            border: none;
            height: 55px;
            padding: 0 40px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
        }

        .register-footer {
            text-align: center;
            padding: 25px;
            background: #f8f9ff;
            border-top: 1px solid #eee;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 6px;
            background: #e0e0e0;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-fill {
            height: 100%;
            width: 0;
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .strength-text {
            font-size: 0.85rem;
            color: #666;
        }

        @media (max-width: 768px) {
            .register-header,
            .register-body {
                padding: 25px;
            }

            .progress-steps {
                gap: 20px;
            }

            .row {
                flex-direction: column;
                gap: 0;
            }

            .weight-display {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
                gap: 15px;
            }

            .btn-prev,
            .btn-next {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <div class="logo-container">
                    <div class="logo-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h1 class="logo-text">EatJoy</h1>
                </div>
                <p class="mb-0 opacity-90" style="position: relative; z-index: 2;">
                    Bergabunglah dengan komunitas sehat kami
                </p>

                <div class="progress-steps">
                    <div class="step active">
                        <div class="step-circle">1</div>
                        <span class="step-label">Informasi</span>
                    </div>
                    <div class="step">
                        <div class="step-circle">2</div>
                        <span class="step-label">Keamanan</span>
                    </div>
                    <div class="step">
                        <div class="step-circle">3</div>
                        <span class="step-label">Target</span>
                    </div>
                </div>
            </div>

            <div class="register-body">
                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf

                    <!-- Step 1: Personal Info -->
                    <div class="form-section active" id="step1">
                        <h3 class="section-title">
                            <i class="bi bi-person-circle"></i>
                            Informasi Pribadi
                        </h3>

                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="nickname">
                                    <i class="bi bi-person-video"></i>Nickname
                                </label>
                                <input type="text" class="form-control" id="nickname" name="nickname"
                                       placeholder="Masukkan nickname Anda" required value="{{ old('nickname') }}">
                                <small class="form-text">
                                    Nama yang akan ditampilkan di website
                                </small>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="username">
                                    <i class="bi bi-person"></i>Username
                                </label>
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Masukkan username" required value="{{ old('username') }}">
                                <small class="form-text">
                                    Untuk login ke akun Anda
                                </small>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">
                                <i class="bi bi-envelope"></i>Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="contoh@email.com" required value="{{ old('email') }}">
                        </div>

                        <div class="form-actions">
                            <div></div>
                            <button type="button" class="btn-next" onclick="nextStep()">
                                Selanjutnya
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Account Security -->
                    <div class="form-section" id="step2">
                        <h3 class="section-title">
                            <i class="bi bi-shield-lock"></i>
                            Keamanan Akun
                        </h3>

                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="password">
                                    <i class="bi bi-lock"></i>Password
                                </label>
                                <div style="position: relative;">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Buat password yang kuat" required>
                                    <button type="button" class="toggle-password"
                                            style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666;"
                                            onclick="togglePassword('password')">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>

                                <div class="password-strength">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="passwordStrengthBar"></div>
                                    </div>
                                    <div class="strength-text" id="passwordStrengthText">Kekuatan password</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="password_confirmation">
                                    <i class="bi bi-lock-fill"></i>Konfirmasi Password
                                </label>
                                <div style="position: relative;">
                                    <input type="password" class="form-control" id="password_confirmation"
                                           name="password_confirmation" placeholder="Ketik ulang password" required>
                                    <button type="button" class="toggle-password"
                                            style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #666;"
                                            onclick="togglePassword('password_confirmation')">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                <small class="form-text" id="passwordMatch"></small>
                            </div>
                        </div>

                        <div class="alert alert-info" style="border-radius: 10px; border: none; background: #f0f7ff;">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle me-3" style="color: #2196F3; font-size: 1.2rem;"></i>
                                <div>
                                    <strong>Tips Password Aman:</strong>
                                    <ul class="mb-0 mt-2" style="padding-left: 20px;">
                                        <li>Minimal 8 karakter</li>
                                        <li>Gunakan kombinasi huruf besar dan kecil</li>
                                        <li>Tambahkan angka dan simbol khusus</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-prev" onclick="prevStep()">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </button>
                            <button type="button" class="btn-next" onclick="nextStep()">
                                Selanjutnya
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Weight Goals -->
                    <div class="form-section" id="step3">
                        <h3 class="section-title">
                            <i class="bi bi-graph-up"></i>
                            Target Kesehatan
                        </h3>

                        <div class="row">
                            <div class="form-group">
                                <label class="form-label" for="current_weight">
                                    <i class="bi bi-speedometer"></i>Berat Badan Sekarang (kg)
                                </label>
                                <input type="number" class="form-control" id="current_weight" name="current_weight"
                                       step="0.1" min="30" max="300" placeholder="Contoh: 75.5"
                                       required value="{{ old('current_weight') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="target_weight">
                                    <i class="bi bi-bullseye"></i>Target Berat Badan (kg)
                                </label>
                                <input type="number" class="form-control" id="target_weight" name="target_weight"
                                       step="0.1" min="30" max="300" placeholder="Contoh: 65.0"
                                       required value="{{ old('target_weight') }}">
                            </div>
                        </div>

                        <!-- Weight Preview -->
                        <div class="weight-preview" id="weightPreview">
                            <div class="weight-display">
                                <div class="weight-item current-weight">
                                    <div class="weight-value" id="currentWeightDisplay">0.0</div>
                                    <div class="weight-label">Berat Sekarang</div>
                                </div>

                                <div class="weight-item difference-weight">
                                    <div class="weight-value" id="weightDifference">0.0 kg</div>
                                    <div class="weight-label">Target Penurunan</div>
                                </div>

                                <div class="weight-item target-weight">
                                    <div class="weight-value" id="targetWeightDisplay">0.0</div>
                                    <div class="weight-label">Target Berat</div>
                                </div>
                            </div>

                            <div class="motivation-card">
                                <div class="motivation-content">
                                    <div class="motivation-icon">
                                        <i class="bi bi-trophy"></i>
                                    </div>
                                    <div class="motivation-text">
                                        <strong id="motivationTitle">Mulai perjalanan sehat Anda</strong>
                                        <p class="mb-0 mt-1" id="motivationMessage">
                                            Masukkan data berat badan untuk melihat target dan motivasi
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn-prev" onclick="prevStep()">
                                <i class="bi bi-arrow-left"></i>
                                Kembali
                            </button>
                            <button type="submit" class="btn-submit">
                                <i class="bi bi-check-circle"></i>
                                Daftar Sekarang
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="register-footer">
                <p class="mb-0">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-decoration-none fw-bold"
                       style="color: var(--primary);">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            initializeForm();
            setupEventListeners();
        });

        let currentStep = 1;
        const totalSteps = 3;

        function initializeForm() {
            updateStepDisplay();
            setupWeightPreview();

            // Auto-focus first input
            document.getElementById('nickname').focus();
        }

        function setupEventListeners() {
            // Weight inputs listener
            document.getElementById('current_weight').addEventListener('input', updateWeightPreview);
            document.getElementById('target_weight').addEventListener('input', updateWeightPreview);

            // Password strength checker
            document.getElementById('password').addEventListener('input', checkPasswordStrength);
            document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        }

        function updateStepDisplay() {
            // Update step indicators
            const steps = document.querySelectorAll('.step');
            steps.forEach((step, index) => {
                step.classList.remove('active');
                if (index + 1 === currentStep) {
                    step.classList.add('active');
                }
            });
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                if (validateStep(currentStep)) {
                    document.getElementById(`step${currentStep}`).classList.remove('active');
                    currentStep++;
                    document.getElementById(`step${currentStep}`).classList.add('active');
                    updateStepDisplay();

                    // Auto-focus first input in new step
                    const firstInput = document.querySelector(`#step${currentStep} input`);
                    if (firstInput) firstInput.focus();
                }
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                currentStep--;
                document.getElementById(`step${currentStep}`).classList.add('active');
                updateStepDisplay();
            }
        }

        function validateStep(step) {
            const stepElement = document.getElementById(`step${step}`);
            const inputs = stepElement.querySelectorAll('input[required]');
            let isValid = true;

            for (const input of inputs) {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    showValidationError(input, 'Field ini wajib diisi');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');

                    // Specific validations
                    if (input.type === 'email' && !isValidEmail(input.value)) {
                        showValidationError(input, 'Format email tidak valid');
                        isValid = false;
                    }

                    if (input.id === 'password' && input.value.length < 8) {
                        showValidationError(input, 'Password minimal 8 karakter');
                        isValid = false;
                    }
                }
            }

            return isValid;
        }

        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function showValidationError(input, message) {
            // Remove existing error
            const existingError = input.parentElement.querySelector('.invalid-feedback');
            if (existingError) existingError.remove();

            // Add error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'invalid-feedback d-block mt-1';
            errorDiv.textContent = message;
            input.parentElement.appendChild(errorDiv);

            // Focus on input
            input.focus();

            // Auto remove error after 3 seconds
            setTimeout(() => {
                errorDiv.remove();
                input.classList.remove('is-invalid');
            }, 3000);
        }

        function togglePassword(fieldId) {
            const input = document.getElementById(fieldId);
            const icon = input.parentElement.querySelector('.toggle-password i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrengthBar');
            const strengthText = document.getElementById('passwordStrengthText');

            let strength = 0;

            // Check criteria
            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
            if (/\d/.test(password)) strength += 25;
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;

            // Update strength bar
            strengthBar.style.width = `${strength}%`;

            // Update color and text
            if (strength <= 25) {
                strengthBar.style.background = '#FF6584';
                strengthText.textContent = 'Password lemah';
                strengthText.style.color = '#FF6584';
            } else if (strength <= 50) {
                strengthBar.style.background = '#FFA726';
                strengthText.textContent = 'Password cukup';
                strengthText.style.color = '#FFA726';
            } else if (strength <= 75) {
                strengthBar.style.background = '#4A90E2';
                strengthText.textContent = 'Password baik';
                strengthText.style.color = '#4A90E2';
            } else {
                strengthBar.style.background = '#4CAF50';
                strengthText.textContent = 'Password sangat kuat';
                strengthText.style.color = '#4CAF50';
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('passwordMatch');

            if (!confirmPassword) {
                matchText.textContent = '';
                matchText.style.color = '';
                return;
            }

            if (password === confirmPassword) {
                matchText.textContent = '✓ Password cocok';
                matchText.style.color = '#4CAF50';
            } else {
                matchText.textContent = '✗ Password tidak cocok';
                matchText.style.color = '#FF6584';
            }
        }

        function setupWeightPreview() {
            updateWeightPreview();
        }

        function updateWeightPreview() {
            const currentWeight = parseFloat(document.getElementById('current_weight').value) || 0;
            const targetWeight = parseFloat(document.getElementById('target_weight').value) || 0;

            // Update display
            document.getElementById('currentWeightDisplay').textContent = currentWeight.toFixed(1);
            document.getElementById('targetWeightDisplay').textContent = targetWeight.toFixed(1);

            const difference = currentWeight - targetWeight;
            const differenceElement = document.getElementById('weightDifference');
            const motivationTitle = document.getElementById('motivationTitle');
            const motivationMessage = document.getElementById('motivationMessage');

            if (difference > 0) {
                differenceElement.textContent = `-${difference.toFixed(1)} kg`;
                differenceElement.style.color = '#4CAF50';

                motivationTitle.textContent = 'Target luar biasa!';
                motivationMessage.innerHTML = `Kamu akan menurunkan <strong>${difference.toFixed(1)} kg</strong>. Bersama EatJoy, targetmu pasti tercapai! 💪`;

                document.querySelector('.motivation-card').style.background = 'linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(46, 125, 50, 0.1))';
                document.querySelector('.motivation-card').style.borderColor = 'rgba(76, 175, 80, 0.2)';
                document.querySelector('.motivation-icon').style.color = '#4CAF50';
            } else if (difference < 0) {
                differenceElement.textContent = `+${Math.abs(difference).toFixed(1)} kg`;
                differenceElement.style.color = '#FF9800';

                motivationTitle.textContent = 'Membangun tubuh sehat!';
                motivationMessage.innerHTML = `Kamu ingin menambah <strong>${Math.abs(difference).toFixed(1)} kg</strong> massa otot. Kami akan membantumu mencapainya dengan cara sehat! 🏋️‍♂️`;

                document.querySelector('.motivation-card').style.background = 'linear-gradient(135deg, rgba(255, 152, 0, 0.1), rgba(245, 124, 0, 0.1))';
                document.querySelector('.motivation-card').style.borderColor = 'rgba(255, 152, 0, 0.2)';
                document.querySelector('.motivation-icon').style.color = '#FF9800';
            } else {
                differenceElement.textContent = '0.0 kg';
                differenceElement.style.color = '#666';

                motivationTitle.textContent = 'Pertahankan kesehatanmu!';
                motivationMessage.innerHTML = 'Berat badan sudah ideal. Fokus pada pola makan sehat dan gaya hidup aktif! 🌟';

                document.querySelector('.motivation-card').style.background = 'linear-gradient(135deg, rgba(33, 150, 243, 0.1), rgba(21, 101, 192, 0.1))';
                document.querySelector('.motivation-card').style.borderColor = 'rgba(33, 150, 243, 0.2)';
                document.querySelector('.motivation-icon').style.color = '#2196F3';
            }
        }
    </script>
</body>
</html>
