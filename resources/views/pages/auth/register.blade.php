<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Registrasi akun Sistem Informasi Desa - Platform digital untuk layanan pemerintahan desa">
    <meta name="author" content="Sistem Informasi Desa">
    <title>Registrasi - Sistem Informasi Desa</title>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --light-color: #f8fafc;
            --dark-color: #1e293b;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.3) 0%, transparent 50%);
            z-index: -1;
        }

        /* Floating shapes */
        .floating-shape {
            position: fixed;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
            z-index: -1;
        }

        .floating-shape:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Back to home button */
        .back-to-home {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .back-to-home:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        /* Main container */
        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: var(--shadow-xl);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Left side - Image/Branding */
        .register-image {
            background: var(--gradient-primary);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .register-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .register-image .content {
            position: relative;
            z-index: 2;
        }

        .register-image .logo {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: rgba(255, 255, 255, 0.2);
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .register-image h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .register-image p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .features-list {
            text-align: left;
            margin-top: 2rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 8px 0;
        }

        .feature-item i {
            background: rgba(255, 255, 255, 0.2);
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 14px;
        }

        /* Right side - Form */
        .register-form {
            padding: 60px 40px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .register-header p {
            color: #64748b;
            font-size: 1rem;
        }

        /* Form styles */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            background: rgba(248, 250, 252, 0.8);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 16px 14px 50px;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-control.is-invalid {
            border-color: var(--danger-color);
        }

        .form-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-group:focus-within .form-icon {
            color: var(--primary-color);
        }

        .invalid-feedback {
            color: var(--danger-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        /* Password toggle */
        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 4px;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary-color);
        }

        /* Checkbox */
        .custom-checkbox {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2rem;
        }

        .custom-checkbox input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            cursor: pointer;
        }

        .custom-checkbox label {
            color: #64748b;
            font-size: 0.9rem;
            cursor: pointer;
            margin: 0;
        }

        /* Submit button */
        .btn-register {
            background: var(--gradient-primary);
            border: none;
            color: white;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:active {
            transform: translateY(0);
        }

        /* Login link */
        .login-link {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: var(--secondary-color);
        }

        /* Loading state */
        .btn-register.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-register.loading .btn-text {
            opacity: 0;
        }

        .btn-register .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-register.loading .spinner {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .back-to-home {
                top: 10px;
                left: 10px;
                padding: 10px 16px;
                font-size: 0.9rem;
            }

            .register-card {
                margin: 10px;
                border-radius: 16px;
            }

            .register-image, .register-form {
                padding: 40px 30px;
            }

            .register-image h2 {
                font-size: 1.5rem;
            }

            .register-header h1 {
                font-size: 1.75rem;
            }

            .features-list {
                display: none;
            }
        }

        @media (max-width: 992px) {
            .register-image {
                display: none;
            }
        }

        /* Success animation */
        @keyframes checkmark {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-checkmark {
            animation: checkmark 0.6s ease-in-out;
        }
    </style>
</head>

<body>
    <!-- Floating shapes for decoration -->
    <div class="floating-shape">
        <i class="fas fa-circle" style="font-size: 60px; color: rgba(255,255,255,0.1);"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-square" style="font-size: 40px; color: rgba(255,255,255,0.1);"></i>
    </div>
    <div class="floating-shape">
        <i class="fas fa-triangle" style="font-size: 50px; color: rgba(255,255,255,0.1);"></i>
    </div>

    <!-- Back to home button -->
    <a href="/" class="back-to-home">
        <i class="fas fa-home"></i>
        <span>Kembali ke Beranda</span>
    </a>

    <div class="register-container">
        <div class="register-card">
            <div class="row g-0">
                <!-- Left side - Branding -->
                <div class="col-lg-6">
                    <div class="register-image">
                        <div class="content">
                            <div class="logo">
                                <i class="fas fa-building"></i>
                            </div>
                            <h2>Sistem Informasi Desa</h2>
                            <p>Platform digital terpercaya yang menghubungkan warga dengan layanan pemerintahan desa secara modern, efisien, dan transparan.</p>
                            
                            <div class="features-list">
                                <div class="feature-item">
                                    <i class="fas fa-check"></i>
                                    <span>Layanan 24/7 Online</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Keamanan Data Terjamin</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-users"></i>
                                    <span>5000+ Pengguna Aktif</span>
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-mobile-alt"></i>
                                    <span>Akses Multi-Platform</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right side - Form -->
                <div class="col-lg-6">
                    <div class="register-form">
                        <div class="register-header">
                            <h1>Buat Akun Baru</h1>
                            <p>Bergabunglah dengan ribuan warga lainnya</p>
                        </div>

                        <form id="registerForm" novalidate>
                            <div class="form-group">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <div class="position-relative">
                                    <i class="fas fa-user form-icon"></i>
                                    <input type="text" 
                                           class="form-control" 
                                           id="name" 
                                           name="name" 
                                           placeholder="Masukkan nama lengkap Anda"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="email">Alamat Email</label>
                                <div class="position-relative">
                                    <i class="fas fa-envelope form-icon"></i>
                                    <input type="email" 
                                           class="form-control" 
                                           id="email" 
                                           name="email" 
                                           placeholder="contoh@email.com"
                                           required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="password">Kata Sandi</label>
                                <div class="position-relative">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Minimal 8 karakter"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">Konfirmasi Kata Sandi</label>
                                <div class="position-relative">
                                    <i class="fas fa-lock form-icon"></i>
                                    <input type="password" 
                                           class="form-control" 
                                           id="confirmPassword" 
                                           name="confirmPassword" 
                                           placeholder="Ulangi kata sandi"
                                           required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="custom-checkbox">
                                <input type="checkbox" id="terms" name="terms" required>
                                <label for="terms">
                                    Saya setuju dengan <a href="#" style="color: var(--primary-color);">Syarat & Ketentuan</a> 
                                    dan <a href="#" style="color: var(--primary-color);">Kebijakan Privasi</a>
                                </label>
                            </div>

                            <button type="submit" class="btn-register">
                                <span class="btn-text">Daftar Sekarang</span>
                                <div class="spinner">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </div>
                            </button>
                        </form>

                        <div class="login-link">
                            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Password toggle functionality
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = field.nextElementSibling;
            const icon = toggle.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Form validation
        function validateForm() {
            let isValid = true;
            const form = document.getElementById('registerForm');
            const formData = new FormData(form);
            
            // Clear previous errors
            document.querySelectorAll('.form-control').forEach(field => {
                field.classList.remove('is-invalid');
            });

            // Name validation
            const name = formData.get('name').trim();
            if (name.length < 2) {
                showFieldError('name', 'Nama harus minimal 2 karakter');
                isValid = false;
            }

            // Email validation
            const email = formData.get('email').trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showFieldError('email', 'Format email tidak valid');
                isValid = false;
            }

            // Password validation
            const password = formData.get('password');
            if (password.length < 8) {
                showFieldError('password', 'Kata sandi harus minimal 8 karakter');
                isValid = false;
            }

            // Confirm password validation
            const confirmPassword = formData.get('confirmPassword');
            if (password !== confirmPassword) {
                showFieldError('confirmPassword', 'Konfirmasi kata sandi tidak sesuai');
                isValid = false;
            }

            // Terms validation
            const terms = document.getElementById('terms');
            if (!terms.checked) {
                alert('Anda harus menyetujui syarat dan ketentuan');
                isValid = false;
            }

            return isValid;
        }

        function showFieldError(fieldName, message) {
            const field = document.getElementById(fieldName);
            const feedback = field.parentElement.querySelector('.invalid-feedback');
            
            field.classList.add('is-invalid');
            feedback.textContent = message;
        }

        // Form submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateForm()) {
                return;
            }

            const submitBtn = document.querySelector('.btn-register');
            
            // Show loading state
            submitBtn.classList.add('loading');
            
            // Simulate API call
            setTimeout(() => {
                submitBtn.classList.remove('loading');
                
                // Show success message
                const btnText = submitBtn.querySelector('.btn-text');
                const originalText = btnText.textContent;
                
                btnText.innerHTML = '<i class="fas fa-check success-checkmark"></i> Berhasil Terdaftar!';
                submitBtn.style.background = 'var(--success-color)';
                
                setTimeout(() => {
                    // Redirect to login or dashboard
                    window.location.href = '/login';
                }, 2000);
                
            }, 2000);
        });

        // Real-time validation
        document.querySelectorAll('.form-control').forEach(field => {
            field.addEventListener('blur', function() {
                const fieldName = this.getAttribute('name');
                
                if (fieldName === 'email') {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (this.value && !emailRegex.test(this.value)) {
                        showFieldError(fieldName, 'Format email tidak valid');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                }
                
                if (fieldName === 'password') {
                    if (this.value && this.value.length < 8) {
                        showFieldError(fieldName, 'Kata sandi harus minimal 8 karakter');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                }
                
                if (fieldName === 'confirmPassword') {
                    const password = document.getElementById('password').value;
                    if (this.value && this.value !== password) {
                        showFieldError(fieldName, 'Konfirmasi kata sandi tidak sesuai');
                    } else {
                        this.classList.remove('is-invalid');
                    }
                }
            });
        });

        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'slideUp 0.8s ease-out';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.form-group').forEach(group => {
            observer.observe(group);
        });
    </script>
</body>
</html>