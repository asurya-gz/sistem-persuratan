@extends('landing.layouts.main')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100 py-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="hero-content">
                        <div class="hero-badge animate__animated animate__fadeInUp">
                            <i class="fas fa-star text-warning me-2"></i>
                            Pelayanan Digital Terpercaya
                        </div>
                        <h1 class="hero-title animate__animated animate__fadeInUp animate__delay-1s" style="color: white;">
                            Sistem Informasi <span class="text-gradient">Desa</span>
                        </h1>
                       <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-2s" style="color: white; max-width: 85%;">
                            Menyediakan layanan informasi dan pelayanan digital yang mudah, cepat, dan terpercaya untuk seluruh warga desa
                        </p>
                        @auth
                        <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-3s">
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                            <a href="{{ url('/surat') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-file-alt me-2"></i>
                                Buat Surat
                            </a>
                        </div>
                        @else
                        <div class="hero-buttons animate__animated animate__fadeInUp animate__delay-3s">
                            <a href="{{ url('/login') }}" class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Masuk ke Sistem
                            </a>
                            <a href="{{ url('/register') }}" class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i>
                                Daftar Sekarang
                            </a>
                        </div>
                        @endauth
                        <div class="hero-features animate__animated animate__fadeInUp animate__delay-4s">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success"></i>
                                <span>Aman & Terpercaya</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-clock text-info"></i>
                                <span>24/7 Online</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-mobile-alt text-warning"></i>
                                <span>Mobile Friendly</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 text-center">
                    <div class="hero-image-container animate__animated animate__fadeInRight animate__delay-1s">
                        <div class="hero-image-bg"></div>
                        <img src="{{ asset('img/landing/hero.png') }}" class="hero-image img-fluid" alt="Hero Image">
                        <div class="floating-elements">
                            <div class="floating-card card-1">
                                <i class="fas fa-file-alt"></i>
                                <span>Surat Online</span>
                            </div>
                            <div class="floating-card card-2">
                                <i class="fas fa-users"></i>
                                <span>Data Penduduk</span>
                            </div>
                            <div class="floating-card card-3">
                                <i class="fas fa-chart-line"></i>
                                <span>Statistik Real-time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section class="services-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="section-header">
                        <span class="section-badge">Layanan Unggulan</span>
                        <h2 class="section-title">Layanan Digital Terlengkap</h2>
                        <p class="section-subtitle">
                            Nikmati kemudahan akses layanan desa yang modern, efisien, dan terintegrasi dalam satu platform
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="service-content">
                            <h4>Pengajuan Surat Digital</h4>
                            <p>Ajukan berbagai jenis surat keterangan secara online dengan proses yang cepat dan mudah</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check text-success me-2"></i>Proses Otomatis</li>
                                <li><i class="fas fa-check text-success me-2"></i>Tracking Status</li>
                                <li><i class="fas fa-check text-success me-2"></i>Download Langsung</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100 featured">
                        <div class="service-badge">Populer</div>
                        <div class="service-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="service-content">
                            <h4>Layanan Pengaduan</h4>
                            <p>Sampaikan keluhan dan pengaduan dengan sistem tracking yang transparan dan responsif</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check text-success me-2"></i>Response Cepat</li>
                                <li><i class="fas fa-check text-success me-2"></i>Follow Up Real-time</li>
                                <li><i class="fas fa-check text-success me-2"></i>Notifikasi Update</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div class="service-content">
                            <h4>Portal Informasi</h4>
                            <p>Akses informasi terkini seputar kegiatan, pengumuman, dan berita desa terbaru</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check text-success me-2"></i>Update Real-time</li>
                                <li><i class="fas fa-check text-success me-2"></i>Notifikasi Push</li>
                                <li><i class="fas fa-check text-success me-2"></i>Arsip Lengkap</li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image-container">
                        <div class="about-image-bg"></div>
                        <img src="{{ asset('img/landing/about.png') }}" class="about-image img-fluid rounded-4 shadow-lg" alt="Tentang Desa">
                        <div class="about-stats">
                            <div class="stat-item">
                                <div class="stat-number">{{ $totalResidents }}+</div>
                                <div class="stat-label">Penduduk</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Digital</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="section-badge">Tentang Kami</span>
                        <h2 class="section-title mb-4">Desa Digital yang Berkembang Pesat</h2>
                        <p class="about-description">
                            Desa kami memiliki keunggulan dalam berbagai bidang, baik pertanian, ekonomi kreatif, maupun wisata alam. 
                            Melalui sistem informasi desa ini, kami berkomitmen untuk meningkatkan kualitas pelayanan publik dan 
                            transparansi informasi.
                        </p>
                        <div class="about-highlights">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-seedling text-success"></i>
                                </div>
                                <div class="highlight-content">
                                    <h5>Pertanian Modern</h5>
                                    <p>Mengembangkan teknologi pertanian berkelanjutan</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-palette text-primary"></i>
                                </div>
                                <div class="highlight-content">
                                    <h5>Ekonomi Kreatif</h5>
                                    <p>Memberdayakan UMKM dan produk lokal unggulan</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-mountain text-info"></i>
                                </div>
                                <div class="highlight-content">
                                    <h5>Wisata Alam</h5>
                                    <p>Destinasi wisata alam yang memukau dan asri</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="section-header">
                        <span class="section-badge">Data & Statistik</span>
                        <h2 class="section-title">Statistik Desa Terkini</h2>
                        <p class="section-subtitle">
                            Informasi statistik real-time mengenai demografi dan perkembangan desa kami
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-number" id="totalCounter">{{ $totalResidents }}</div>
                            <div class="stats-label">Total Penduduk</div>
                            <div class="stats-description">Jumlah keseluruhan warga desa</div>
                        </div>
                        <div class="stats-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+2.5%</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon male">
                            <i class="fas fa-male"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-number" id="maleCounter">{{ $maleResidents }}</div>
                            <div class="stats-label">Penduduk Laki-laki</div>
                            <div class="stats-description">{{ number_format(($maleResidents/$totalResidents)*100, 1) }}% dari total penduduk</div>
                        </div>
                        <div class="stats-trend">
                            <i class="fas fa-minus text-warning"></i>
                            <span class="text-muted" style="color: white;">Stabil</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stats-card">
                        <div class="stats-icon female">
                            <i class="fas fa-female"></i>
                        </div>
                        <div class="stats-content">
                            <div class="stats-number" id="femaleCounter">{{ $femaleResidents }}</div>
                            <div class="stats-label">Penduduk Perempuan</div>
                            <div class="stats-description">{{ number_format(($femaleResidents/$totalResidents)*100, 1) }}% dari total penduduk</div>
                        </div>
                        <div class="stats-trend">
                            <i class="fas fa-arrow-up text-success"></i>
                            <span class="text-success">+1.8%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="cta-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="cta-content">
                            <h3 class="cta-title">Siap Menggunakan Layanan Digital Desa?</h3>
                            <p class="cta-subtitle">
                                Bergabunglah dengan ribuan warga yang telah merasakan kemudahan layanan digital desa kami. 
                                Daftarkan diri Anda sekarang dan nikmati berbagai kemudahan pelayanan.
                            </p>
                            <div class="cta-features">
                                <div class="cta-feature">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Gratis selamanya
                                </div>
                                <div class="cta-feature">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Akses 24/7
                                </div>
                                <div class="cta-feature">
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                    Support responsive
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        @auth
                        <div class="cta-buttons">
                            <a class="btn btn-light btn-lg mb-3 w-100" href="{{ url('/dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Ke Dashboard
                            </a>
                            <a class="btn btn-outline-light btn-lg w-100" href="{{ url('/surat') }}">
                                <i class="fas fa-file-alt me-2"></i>
                                Buat Surat Baru
                            </a>
                        </div>
                        @else
                        <div class="cta-buttons">
                            <a class="btn btn-light btn-lg mb-3 w-100" href="{{ url('/register') }}">
                                <i class="fas fa-user-plus me-2"></i>
                                Daftar Sekarang
                            </a>
                            <a class="btn btn-outline-light btn-lg w-100" href="{{ url('/login') }}">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Sudah Punya Akun?
                            </a>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="section-header">
                        <span class="section-badge">FAQ</span>
                        <h2 class="section-title">Pertanyaan yang Sering Diajukan</h2>
                        <p class="section-subtitle">
                            Temukan jawaban untuk pertanyaan umum seputar layanan sistem informasi desa
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara mendaftar di sistem ini?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda dapat mendaftar dengan mengklik tombol "Daftar Sekarang" dan mengisi formulir pendaftaran dengan data yang valid. Pastikan menggunakan email yang aktif untuk verifikasi akun.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Berapa lama proses pengajuan surat?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Proses pengajuan surat biasanya memakan waktu 1-3 hari kerja, tergantung jenis surat yang diajukan. Anda dapat memantau status pengajuan melalui dashboard akun Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah layanan ini gratis?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, semua layanan dasar sistem informasi desa ini gratis untuk seluruh warga. Beberapa layanan khusus mungkin dikenakan biaya administrasi sesuai peraturan yang berlaku.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preserve database values
        const totalValue = {{ $totalResidents }};
        const maleValue = {{ $maleResidents }};
        const femaleValue = {{ $femaleResidents }};
        
        // Counter animation
        function animateCounter(element, target, duration = 2000) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stats-number');
                    counters.forEach(counter => {
                        const target = parseInt(counter.textContent);
                        animateCounter(counter, target);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.statistics-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Parallax effect for hero background
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            const heroBackground = document.querySelector('.hero-background');
            if (heroBackground) {
                heroBackground.style.transform = `translateY(${rate}px)`;
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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

        // Add loading animation to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Don't prevent default for actual navigation
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
</script>
@endsection