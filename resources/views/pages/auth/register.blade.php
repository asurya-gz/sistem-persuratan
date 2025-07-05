<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - Sistem Informasi Desa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 font-inter relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20"></div>
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, rgba(79, 70, 229, 0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(147, 51, 234, 0.1) 0%, transparent 50%);"></div>
    </div>
    
    <!-- Back to Home Button -->
    <a href="{{ url('/') }}" class="fixed top-6 left-6 z-50 flex items-center gap-2 bg-white/90 backdrop-blur-sm text-gray-700 px-4 py-2 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 hover:bg-white group border border-gray-200">
        <i class="fas fa-home text-indigo-600 group-hover:text-indigo-700 transition-colors"></i>
        <span class="font-medium">Kembali ke Beranda</span>
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

    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">
        <div class="w-full max-w-6xl bg-white rounded-2xl shadow-2xl overflow-hidden flex">
            <!-- Left Side - Visual Content -->
            <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-indigo-600 to-purple-700 p-12 flex-col justify-center text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-600/90 to-purple-700/90"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -translate-y-48 translate-x-48"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-white/10 rounded-full translate-y-36 -translate-x-36"></div>
                
                <div class="relative z-10">
                    <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mb-8">
                        <i class="fas fa-user-plus text-3xl text-white"></i>
                    </div>
                    <h2 class="text-3xl font-bold mb-4 leading-tight">Bergabunglah dengan Kami</h2>
                    <p class="text-lg text-indigo-100 mb-8 leading-relaxed">Daftarkan diri Anda dan nikmati kemudahan layanan digital desa yang modern dan terpercaya</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check w-5 h-5 text-green-300"></i>
                            <span class="text-indigo-100">Registrasi gratis dan mudah</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check w-5 h-5 text-green-300"></i>
                            <span class="text-indigo-100">Akses ke semua layanan desa</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check w-5 h-5 text-green-300"></i>
                            <span class="text-indigo-100">Keamanan data terjamin</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-check w-5 h-5 text-green-300"></i>
                            <span class="text-indigo-100">Support 24/7 dari tim kami</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Side - Register Form -->
            <div class="w-full lg:w-1/2 p-8 lg:p-12">
                <!-- Form Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h1>
                    <p class="text-gray-600">Isi formulir di bawah ini untuk mendaftar</p>
                </div>

                <!-- Register Form -->
                <form class="space-y-6" action="/register" method="POST">
                    @csrf
                    @method('POST')
                    
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('name') border-red-500 @enderror" 
                               placeholder="Masukan nama lengkap" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('email') border-red-500 @enderror" 
                               placeholder="contoh@email.com" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" 
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors @error('password') border-red-500 @enderror" 
                                   placeholder="Minimal 8 karakter" required>
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="mt-2 text-sm text-gray-500">
                            <p>Kata sandi harus mengandung minimal 8 karakter</p>
                        </div>
                        @error('password')
                            <span class="block text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" 
                                   placeholder="Ulangi kata sandi" required>
                            <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none" id="togglePasswordConfirmation">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div id="passwordMatch" class="mt-2 text-sm hidden">
                            <span class="text-red-500">Kata sandi tidak cocok</span>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 mt-1" required>
                        <label for="terms" class="ml-3 text-sm text-gray-700">
                            Saya menyetujui <a href="#" class="text-indigo-600 hover:text-indigo-500 transition-colors">Syarat dan Ketentuan</a> serta <a href="#" class="text-indigo-600 hover:text-indigo-500 transition-colors">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors disabled:opacity-60 disabled:cursor-not-allowed flex items-center justify-center gap-2">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar Sekarang</span>
                    </button>

                    <!-- Divider -->
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">atau</span>
                        </div>
                    </div>

                    <!-- Google Register Button -->
                    <button type="button" class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-lg font-medium hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors flex items-center justify-center gap-2" id="googleRegister">
                        <i class="fab fa-google text-red-500"></i>
                        <span>Daftar dengan Google</span>
                    </button>
                </form>

                <!-- Form Footer -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600">Sudah punya akun? <a href="/login" class="text-indigo-600 hover:text-indigo-500 font-medium transition-colors">Masuk di sini</a></p>
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

        // Password confirmation toggle functionality
        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
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

        // Password match validation
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchIndicator = document.getElementById('passwordMatch');
            
            if (confirmPassword.length > 0) {
                if (password === confirmPassword) {
                    matchIndicator.innerHTML = '<span class="text-green-500">Kata sandi cocok</span>';
                    matchIndicator.classList.remove('hidden');
                } else {
                    matchIndicator.innerHTML = '<span class="text-red-500">Kata sandi tidak cocok</span>';
                    matchIndicator.classList.remove('hidden');
                }
            } else {
                matchIndicator.classList.add('hidden');
            }
        }

        document.getElementById('password').addEventListener('input', checkPasswordMatch);
        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

        // Google register simulation
        document.getElementById('googleRegister').addEventListener('click', function() {
            Swal.fire({
                title: "Info",
                text: "Fitur registrasi dengan Google akan segera tersedia!",
                icon: "info"
            });
        });

        // Form validation styling
        document.getElementById('name').addEventListener('blur', function() {
            if (this.value.trim().length < 2) {
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-300');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-300');
            }
        });

        document.getElementById('email').addEventListener('blur', function() {
            if (this.value && !this.validity.valid) {
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-300');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-300');
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            if (this.value.length > 0 && this.value.length < 8) {
                this.classList.add('border-yellow-400');
                this.classList.remove('border-gray-300');
            } else if (this.value.length >= 8) {
                this.classList.remove('border-yellow-400');
                this.classList.add('border-green-400');
            } else {
                this.classList.remove('border-yellow-400', 'border-green-400');
                this.classList.add('border-gray-300');
            }
        });

        // Loading state for form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({
                    title: "Kesalahan",
                    text: "Kata sandi dan konfirmasi kata sandi tidak cocok!",
                    icon: "error"
                });
                return;
            }
            
            if (!terms) {
                e.preventDefault();
                Swal.fire({
                    title: "Kesalahan",
                    text: "Anda harus menyetujui syarat dan ketentuan!",
                    icon: "error"
                });
                return;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Memproses...</span>';
            submitBtn.disabled = true;
        });
    </script>
</body>
</html>