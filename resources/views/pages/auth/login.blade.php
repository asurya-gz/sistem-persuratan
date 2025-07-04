<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Desa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="background-pattern"></div>
    
    <a href="/" class="back-to-home">
        <i class="fas fa-home"></i>
        <span>Kembali ke Beranda</span>
    </a>

    <div class="login-container">
        <div class="login-card">
            <div class="login-visual">
                <div class="visual-content">
                    <div class="visual-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h2 class="visual-title">Sistem Informasi Desa</h2>
                    <p class="visual-subtitle">Platform digital terpercaya untuk layanan pemerintahan desa yang modern dan efisien</p>
                    <ul class="visual-features">
                        <li><i class="fas fa-check"></i> Akses 24/7 ke semua layanan</li>
                        <li><i class="fas fa-check"></i> Keamanan data terjamin</li>
                        <li><i class="fas fa-check"></i> Interface yang user-friendly</li>
                        <li><i class="fas fa-check"></i> Dukungan teknis profesional</li>
                    </ul>
                </div>
            </div>

            <div class="login-form-section">
                <div class="form-header">
                    <h1 class="form-title">Selamat Datang Kembali</h1>
                    <p class="form-subtitle">Silakan masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <div id="errorMessage" class="error-message" style="display: none;">
                    <i class="fas fa-exclamation-circle"></i>
                    <span id="errorText"></span>
                </div>

                <form class="login-form" id="loginForm">
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan kata sandi" required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <div class="checkbox-container">
                            <input type="checkbox" id="rememberMe" name="remember">
                            <label for="rememberMe" class="checkbox-label">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-password">Lupa kata sandi?</a>
                    </div>

                    <button type="submit" class="btn btn-primary" id="loginBtn">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk ke Akun
                    </button>

                    <div class="divider">
                        <span>atau</span>
                    </div>

                    <button type="button" class="btn btn-google">
                        <i class="fab fa-google"></i>
                        Masuk dengan Google
                    </button>
                </form>

                <div class="form-footer">
                    <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        });

        // Form submission with loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const loginBtn = document.getElementById('loginBtn');
            const errorMessage = document.getElementById('errorMessage');
            
            // Hide any existing error messages
            errorMessage.style.display = 'none';
            
            // Add loading state
            loginBtn.classList.add('btn-loading');
            loginBtn.disabled = true;
            
            // Simulate API call (replace with actual login logic)
            setTimeout(() => {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                
                // Simple validation (replace with actual authentication)
                if (email === 'admin@desa.id' && password === 'password123') {
                    // Success - redirect or show success message
                    window.location.href = '/dashboard';
                } else {
                    // Error - show error message
                    document.getElementById('errorText').textContent = 'Email atau kata sandi tidak valid. Silakan coba lagi.';
                    errorMessage.style.display = 'block';
                    
                    // Remove loading state
                    loginBtn.classList.remove('btn-loading');
                    loginBtn.disabled = false;
                }
            }, 2000);
        });

        // Google login simulation
        document.querySelector('.btn-google').addEventListener('click', function() {
            alert('Fitur login dengan Google akan segera tersedia!');
        });

        // Auto-dismiss error messages
        function showError(message) {
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            
            errorText.textContent = message;
            errorMessage.style.display = 'block';
            
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        }

        // Form validation
        document.getElementById('email').addEventListener('blur', function() {
            if (this.value && !this.validity.valid) {
                this.style.borderColor = 'var(--error-color)';
            } else {
                this.style.borderColor = 'var(--border-color)';
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                this.style.borderColor = 'var(--warning-color)';
            } else {
                this.style.borderColor = 'var(--border-color)';
            }
        });
    </script>
</body>
</html>