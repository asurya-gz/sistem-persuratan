@vite('resources/css/app.css')

<!-- Header -->
<header id="header" class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <img src="{{ asset('img/landing/logo.png') }}" alt="Logo Desa" class="h-10 w-auto">
                <span class="text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors duration-300">
                    Sistem Informasi Desa
                </span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-indigo-600 font-medium border-b-2 border-indigo-600 pb-1 hover:text-indigo-700 transition-colors duration-300">
                    Beranda
                </a>
                
                @if(Auth::check())
                <!-- User Dropdown -->
                <div class="relative group">
                    <button class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 focus:outline-none">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm transform group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 transition-all duration-300 ease-out">
                        <div class="py-2">
                            <a href="{{ url('/profile') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                                <i class="fas fa-user w-4 mr-3 text-gray-500"></i>
                                Profil
                            </a>
                            <a href="{{ url('/surat') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                                <i class="fas fa-file-alt w-4 mr-3 text-gray-500"></i>
                                Pengajuan Surat
                            </a>
                            <a href="{{ url('/complaint') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                                <i class="fas fa-comment-alt w-4 mr-3 text-gray-500"></i>
                                Pengaduan
                            </a>
                            <a href="{{ url('/change-password') }}" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200 border-b border-gray-100">
                                <i class="fas fa-lock w-4 mr-3 text-gray-500"></i>
                                Ubah Password
                            </a>
                            <form action="{{ url('/logout') }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-3 text-sm text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors duration-200 text-left">
                                    <i class="fas fa-sign-out-alt w-4 mr-3"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ url('/login') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    Login
                </a>
                @endif
            </nav>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden p-2 rounded-lg text-gray-700 hover:text-indigo-600 hover:bg-gray-100 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500" id="mobile-menu-button">
                <i class="fas fa-bars text-xl" id="mobile-menu-icon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="lg:hidden bg-white border-t border-gray-200 shadow-lg transform -translate-y-full opacity-0 transition-all duration-300 ease-in-out" id="mobile-menu">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ url('/') }}" class="block py-3 px-4 text-indigo-600 bg-indigo-50 rounded-lg font-medium border-l-4 border-indigo-600">
                Beranda
            </a>
            
            @if(Auth::check())
            <div class="pt-3 border-t border-gray-200">
                <div class="px-4 py-2 text-sm text-gray-500 font-medium">
                    {{ Auth::user()->name }}
                </div>
                <div class="space-y-1">
                    <a href="{{ url('/profile') }}" class="flex items-center py-3 px-4 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-user w-4 mr-3 text-gray-500"></i>
                        Profil
                    </a>
                    <a href="{{ url('/surat') }}" class="flex items-center py-3 px-4 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-file-alt w-4 mr-3 text-gray-500"></i>
                        Pengajuan Surat
                    </a>
                    <a href="{{ url('/complaint') }}" class="flex items-center py-3 px-4 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-comment-alt w-4 mr-3 text-gray-500"></i>
                        Pengaduan
                    </a>
                    <a href="{{ url('/change-password') }}" class="flex items-center py-3 px-4 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                        <i class="fas fa-lock w-4 mr-3 text-gray-500"></i>
                        Ubah Password
                    </a>
                    <form action="{{ url('/logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full flex items-center py-3 px-4 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200 text-left">
                            <i class="fas fa-sign-out-alt w-4 mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ url('/login') }}" class="block bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 transition-colors duration-300 text-center">
                Login
            </a>
            @endif
        </div>
    </div>
</header>

<!-- CSS Reset untuk menghindari konflik -->
<style>
    /* Reset CSS untuk header agar tidak bentrok dengan existing styles */
    #header * {
        box-sizing: border-box;
    }
    
    #header {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    /* Override existing styles yang mungkin bentrok */
    #header .container {
        max-width: none !important;
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }
    
    #header .navbar {
        position: static !important;
        display: block !important;
    }
    
    #header .navbar ul {
        list-style: none !important;
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
    }
    
    #header .navbar ul li {
        margin: 0 !important;
        padding: 0 !important;
        display: inline-block !important;
        position: relative !important;
    }
    
    #header .logo {
        text-decoration: none !important;
        color: inherit !important;
    }
    
    #header .logo:hover {
        text-decoration: none !important;
    }
    
    /* Ensure mobile menu works properly */
    @media (max-width: 1023px) {
        #header .navbar {
            display: none !important;
        }
    }
    
    /* Smooth animations */
    #mobile-menu.show {
        transform: translateY(0) !important;
        opacity: 1 !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuIcon = document.getElementById('mobile-menu-icon');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            const isOpen = mobileMenu.classList.contains('show');
            
            if (isOpen) {
                mobileMenu.classList.remove('show');
                mobileMenuIcon.classList.remove('fa-times');
                mobileMenuIcon.classList.add('fa-bars');
            } else {
                mobileMenu.classList.add('show');
                mobileMenuIcon.classList.remove('fa-bars');
                mobileMenuIcon.classList.add('fa-times');
            }
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (mobileMenu && mobileMenuButton) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.remove('show');
                mobileMenuIcon.classList.remove('fa-times');
                mobileMenuIcon.classList.add('fa-bars');
            }
        }
    });
    
    // Close mobile menu when clicking on a link
    const mobileLinks = mobileMenu?.querySelectorAll('a');
    if (mobileLinks) {
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('show');
                mobileMenuIcon.classList.remove('fa-times');
                mobileMenuIcon.classList.add('fa-bars');
            });
        });
    }
    
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
});
</script>