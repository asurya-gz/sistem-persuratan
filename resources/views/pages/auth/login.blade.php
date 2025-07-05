<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Sistem Informasi Desa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="background-pattern"></div>
    
    <a href="{{ url('/') }}" class="back-to-home">
        <i class="fas fa-home"></i>
        <span>Kembali ke Beranda</span>
    </a>

    <!-- SweetAlert untuk error handling -->
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Terjadi Kesalahan",
                text: "@foreach($errors->all() as $error) {{ $error }}{{ $loop->last ? '.' : ',' }}@endforeach",
                icon: "error"
            });
        </script>
    @endif

    <!-- SweetAlert untuk success message -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif

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

                <!-- Form menggunakan Laravel form submission -->
                <form class="login-form" action="/login" method="POST">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               placeholder="contoh@email.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Masukkan kata sandi" required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-options">
                        <div class="checkbox-container">
                            <input type="checkbox" id="rememberMe" name="remember">
                            <label for="rememberMe" class="checkbox-label">Ingat saya</label>
                        </div>
                        <a href="#" class="forgot-password">Lupa kata sandi?</a>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk ke Akun
                    </button>

                    <div class="divider">
                        <span>atau</span>
                    </div>

                    <button type="button" class="btn btn-google" id="googleLogin">
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

        // Google login simulation
        document.getElementById('googleLogin').addEventListener('click', function() {
            Swal.fire({
                title: "Info",
                text: "Fitur login dengan Google akan segera tersedia!",
                icon: "info"
            });
        });

        // Form validation styling
        document.getElementById('email').addEventListener('blur', function() {
            if (this.value && !this.validity.valid) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 6) {
                this.style.borderColor = '#ffc107';
            } else {
                this.style.borderColor = '';
            }
        });

        // Loading state for form submission
        document.querySelector('.login-form').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            submitBtn.disabled = true;
        });
    </script>

    <style>
        /* Additional styles for error handling */
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7280;
            cursor: pointer;
            padding: 0;
            font-size: 14px;
        }

        .password-toggle:hover {
            color: #374151;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .login-container {
                padding: 1rem;
            }
            
            .login-card {
                flex-direction: column;
                max-width: 100%;
            }
            
            .login-visual {
                display: none;
            }
        }
    </style>
</body>
</html>