{{-- Import Tailwind CSS --}}
@vite('resources/css/app.css')

@extends('layouts.app')

@section('content')
<div class="min-h-screen overflow-hidden">
    <!-- Floating background elements -->
    <div class="absolute top-20 right-20 w-32 h-32 bg-gradient-to-br from-indigo-200/30 to-purple-200/30 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-40 h-40 bg-gradient-to-br from-purple-200/30 to-pink-200/30 rounded-full blur-xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-20 h-20 bg-gradient-to-br from-indigo-100/50 to-purple-100/50 rounded-full blur-lg animate-bounce"></div>

    <div class="relative z-10 p-6 space-y-6">
        <!-- Page Heading -->
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Dashboard
            </h1>
        </div>
        
        <!-- Welcome Card -->
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-home text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Selamat Datang, {{ $user->name }}!</h2>
                    <p class="text-gray-600 mt-1">Selamat datang di Sistem Informasi Desa. Silahkan gunakan menu di samping untuk mengakses berbagai fitur.</p>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Total Penduduk Card -->
            <div class="group relative bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex-1">
                        <div class="text-indigo-100 text-sm font-semibold uppercase tracking-wide mb-2">
                            Jumlah Penduduk
                        </div>
                        <div class="text-4xl font-bold mb-2">{{ $totalResidents }}</div>
                        <div class="text-indigo-100 text-sm">Total warga terdaftar di sistem</div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-white/5 rounded-full transform translate-x-8 translate-y-8"></div>
            </div>

            <!-- Permintaan Surat Card -->
            <div class="group relative bg-gradient-to-br from-pink-500 to-red-500 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex-1">
                        <div class="text-pink-100 text-sm font-semibold uppercase tracking-wide mb-2">
                            Permintaan Surat
                        </div>
                        <div class="text-4xl font-bold mb-2">{{ $pendingSurat }}</div>
                        <div class="text-pink-100 text-sm">Menunggu untuk diproses</div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                        <i class="fas fa-file-alt text-2xl"></i>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-white/5 rounded-full transform translate-x-8 translate-y-8"></div>
            </div>

            <!-- Surat Selesai Card -->
            <div class="group relative bg-gradient-to-br from-emerald-500 to-teal-500 rounded-2xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10 flex items-center justify-between">
                    <div class="flex-1">
                        <div class="text-emerald-100 text-sm font-semibold uppercase tracking-wide mb-2">
                            Surat Selesai
                        </div>
                        <div class="text-4xl font-bold mb-2">{{ $completedSurat }}</div>
                        <div class="text-emerald-100 text-sm">Surat yang telah disetujui</div>
                    </div>
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border border-white/30">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-white/5 rounded-full transform translate-x-8 translate-y-8"></div>
            </div>
        </div>

        <!-- Admin Quick Menu -->
        @if($user->role_id == 1)
        <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden hover:shadow-2xl transition-all duration-300">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 px-6 py-4">
                <h3 class="text-xl font-bold text-white flex items-center">
                    <i class="fas fa-bolt mr-3"></i>
                    Menu Cepat Admin
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ url('/resident') }}" 
                       class="group relative bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl p-6 text-white hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex items-center justify-center flex-col text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-3">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <span class="font-semibold">Kelola Data Penduduk</span>
                        </div>
                    </a>
                    
                    <a href="{{ url('/account-request') }}" 
                       class="group relative bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl p-6 text-white hover:from-emerald-600 hover:to-teal-700 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex items-center justify-center flex-col text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-3">
                                <i class="fas fa-user-plus text-xl"></i>
                            </div>
                            <span class="font-semibold">Permintaan Akun</span>
                        </div>
                    </a>
                    
                    <a href="{{ url('/complaint') }}" 
                       class="group relative bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl p-6 text-white hover:from-blue-600 hover:to-cyan-700 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative z-10 flex items-center justify-center flex-col text-center">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-3">
                                <i class="fas fa-bullhorn text-xl"></i>
                            </div>
                            <span class="font-semibold">Kelola Pengaduan</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Custom animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out;
    }
    
    /* Smooth hover effects */
    .hover-lift:hover {
        transform: translateY(-4px);
    }
    
    /* Glassmorphism enhancements */
    .backdrop-blur-sm {
        backdrop-filter: blur(8px);
    }
</style>

@endsection