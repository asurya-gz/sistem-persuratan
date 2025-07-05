@vite('resources/css/app.css')

<!-- Footer -->
<footer id="footer" class="bg-gray-900/95 backdrop-blur-md text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, rgba(99, 102, 241, 0.4) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(139, 92, 246, 0.4) 0%, transparent 50%);"></div>
    </div>
    
    <!-- Footer Top -->
    <div class="footer-top py-16 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8">
                <!-- Company Info - lg:col-span-5 -->
                <div class="lg:col-span-5 md:col-span-1">
                    <div class="footer-info">
                        <!-- Logo Section -->
                        <div class="flex items-center space-x-3 mb-6 group">
                            <img src="{{ asset('img/landing/logo.png') }}" alt="Logo Desa" class="h-10 w-auto">
                            <span class="text-xl font-semibold text-white group-hover:text-indigo-400 transition-colors duration-300">
                                Sistem Informasi Desa
                            </span>
                        </div>
                        
                        <div class="text-gray-300 leading-relaxed mb-6 space-y-2">
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-map-marker-alt text-indigo-400 w-4"></i>
                                <span>Jl. Raya Desa No.123</span>
                            </p>
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-map-pin text-indigo-400 w-4"></i>
                                <span>Kecamatan Example, 12345</span>
                            </p>
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-phone text-indigo-400 w-4"></i>
                                <span>+62 1234 5678 90</span>
                            </p>
                            <p class="flex items-center space-x-2">
                                <i class="fas fa-envelope text-indigo-400 w-4"></i>
                                <span>info@desaku.id</span>
                            </p>
                        </div>
                        
                        <div class="social-links flex gap-3 mt-6">
                            <a href="#" class="facebook w-10 h-10 bg-blue-600/80 hover:bg-blue-600 rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-blue-500/20 backdrop-blur-sm">
                                <i class="fab fa-facebook-f text-white"></i>
                            </a>
                            <a href="#" class="instagram w-10 h-10 bg-gradient-to-r from-pink-500/80 to-purple-600/80 hover:from-pink-500 hover:to-purple-600 rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-purple-500/20 backdrop-blur-sm">
                                <i class="fab fa-instagram text-white"></i>
                            </a>
                            <a href="#" class="youtube w-10 h-10 bg-red-600/80 hover:bg-red-600 rounded-lg flex items-center justify-center transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-red-500/20 backdrop-blur-sm">
                                <i class="fab fa-youtube text-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links - lg:col-span-3 -->
                <div class="lg:col-span-3 md:col-span-1">
                    <div class="footer-links">
                        <h4 class="text-lg font-semibold text-gray-600 mb-6 flex items-center">
                            <i class="fas fa-link text-indigo-400 mr-2 teks-black"></i>
                            Tautan Cepat
                        </h4>
                        <ul class="space-y-3">
                            <li>
                                <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-indigo-400 transition-all duration-300 group py-2 px-3 rounded-lg hover:bg-white/5">
                                    <i class="fas fa-chevron-right text-indigo-400 text-sm transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Beranda</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/login') }}" class="flex items-center space-x-3 text-gray-300 hover:text-indigo-400 transition-all duration-300 group py-2 px-3 rounded-lg hover:bg-white/5">
                                    <i class="fas fa-chevron-right text-indigo-400 text-sm transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/register') }}" class="flex items-center space-x-3 text-gray-300 hover:text-indigo-400 transition-all duration-300 group py-2 px-3 rounded-lg hover:bg-white/5">
                                    <i class="fas fa-chevron-right text-indigo-400 text-sm transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Register</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-indigo-400 transition-all duration-300 group py-2 px-3 rounded-lg hover:bg-white/5">
                                    <i class="fas fa-chevron-right text-indigo-400 text-sm transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Layanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center space-x-3 text-gray-300 hover:text-indigo-400 transition-all duration-300 group py-2 px-3 rounded-lg hover:bg-white/5">
                                    <i class="fas fa-chevron-right text-indigo-400 text-sm transform group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Kontak</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- About Section - lg:col-span-4 -->
                <div class="lg:col-span-4 md:col-span-2">
                    <div class="footer-newsletter">
                        <h4 class="text-lg font-semibold text-gray-600 mb-6 flex items-center">
                            <i class="fas fa-info-circle text-indigo-400 mr-2"></i>
                            Tentang Kami
                        </h4>
                        <div class="text-gray-600 text-sm leading-relaxed space-y-4">
                            <p class="bg-white/5 p-4 rounded-lg border border-gray-700/50 backdrop-blur-sm">
                                Sistem Informasi Desa adalah platform digital yang dirancang untuk memudahkan warga desa dalam mengakses berbagai layanan administrasi dan informasi penting terkait desa.
                            </p>
                            <p class="bg-white/5 p-4 rounded-lg border border-gray-700/50 backdrop-blur-sm">
                                Kami berkomitmen untuk meningkatkan transparansi dan efisiensi pelayanan publik di tingkat desa.
                            </p>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="py-6 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="copyright text-center md:text-left">
                    <p class="text-gray-400 text-sm flex items-center justify-center md:justify-start gap-2">
                        <i class="fas fa-copyright text-indigo-400"></i>
                        <span>{{ date('Y') }} <strong><span class="text-gray-600">Sistem Informasi Desa</span></strong>. All Rights Reserved</span>
                    </p>
                </div>
                <div class="credits text-center md:text-right">
                    <p class="text-gray-400 text-sm flex items-center justify-center md:justify-end gap-1">
                        <span>Dibuat dengan</span>
                        <i class="fas fa-heart text-red-500 mx-1 animate-pulse"></i>
                        <span>untuk kemajuan desa</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- CSS untuk styling yang konsisten dengan header -->
<style>
    /* Reset dan base styling */
    #footer {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    #footer * {
        box-sizing: border-box;
    }
    
    /* Ensure proper spacing */
    #footer .footer-info p {
        margin-bottom: 0;
    }
    
    #footer .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    #footer .footer-links li {
        margin: 0;
        padding: 0;
    }
    
    /* Glassmorphism effect untuk konsistensi dengan header */
    #footer {
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }
    
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
    
    /* Hover effects yang konsisten */
    #footer a {
        transition: all 0.3s ease;
    }
    
    #footer .social-links a {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    
    /* Newsletter input focus state */
    #footer input[type="email"]:focus {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        #footer .footer-top {
            padding: 3rem 0;
        }
        
        #footer .social-links {
            justify-content: center;
        }
        
        #footer .footer-newsletter .flex {
            flex-direction: column;
        }
        
        #footer .footer-newsletter button {
            width: 100%;
            margin-top: 0.5rem;
        }
    }
    
    /* Animation untuk heart icon */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    /* Subtle animation untuk background pattern */
    #footer .absolute.inset-0 {
        animation: subtle-float 20s ease-in-out infinite;
    }
    
    @keyframes subtle-float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Newsletter subscription
    const newsletterButton = document.querySelector('#footer button');
    const newsletterInput = document.querySelector('#footer input[type="email"]');
    
    if (newsletterButton && newsletterInput) {
        newsletterButton.addEventListener('click', function(e) {
            e.preventDefault();
            const email = newsletterInput.value.trim();
            
            if (email) {
                // Add loading state
                const originalContent = newsletterButton.innerHTML;
                newsletterButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                newsletterButton.disabled = true;
                
                // Simulate API call
                setTimeout(() => {
                    newsletterButton.innerHTML = '<i class="fas fa-check"></i>';
                    newsletterButton.classList.add('bg-green-600');
                    newsletterButton.classList.remove('bg-indigo-600');
                    newsletterInput.value = '';
                    
                    // Reset after 3 seconds
                    setTimeout(() => {
                        newsletterButton.innerHTML = originalContent;
                        newsletterButton.classList.remove('bg-green-600');
                        newsletterButton.classList.add('bg-indigo-600');
                        newsletterButton.disabled = false;
                    }, 3000);
                }, 1000);
            }
        });
        
        // Handle Enter key
        newsletterInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                newsletterButton.click();
            }
        });
    }
    
    // Smooth scrolling untuk anchor links di footer
    document.querySelectorAll('#footer a[href^="#"]').forEach(anchor => {
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
    
    // Add parallax effect to background pattern
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const footer = document.getElementById('footer');
        const footerTop = footer.offsetTop;
        const windowHeight = window.innerHeight;
        
        if (scrolled + windowHeight > footerTop) {
            const pattern = footer.querySelector('.absolute.inset-0');
            if (pattern) {
                const speed = 0.3;
                pattern.style.transform = `translateY(${(scrolled - footerTop) * speed}px)`;
            }
        }
    });
});
</script>