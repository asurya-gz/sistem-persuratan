<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header dengan Dropdown</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom animations */
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease-out;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        .dropdown-arrow {
            transition: transform 0.3s ease;
        }
        
        .dropdown-arrow.rotate {
            transform: rotate(180deg);
        }
        
        .mobile-menu {
            display: none;
        }
        
        .mobile-menu.show {
            display: block;
        }
        
        .mobile-dropdown {
            display: none;
        }
        
        .mobile-dropdown.show {
            display: block;
        }
        
        /* Login Button Styles - Fix for white background issue */
        .login-btn {
            background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%) !important;
            color: white !important;
            border: none !important;
            padding: 0.5rem 1.5rem !important;
            border-radius: 0.5rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
        }
        
        .login-btn:hover {
            background: linear-gradient(135deg, #4338ca 0%, #7c3aed 100%) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
        }
        
        .login-btn:active {
            transform: translateY(0) !important;
        }
        
        /* Mobile Login Button */
        .mobile-login-btn {
            background: linear-gradient(135deg, #4f46e5 0%, #9333ea 100%) !important;
            color: white !important;
            border: none !important;
            padding: 0.75rem 1rem !important;
            border-radius: 0.5rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            text-align: center !important;
            display: block !important;
            width: 100% !important;
        }
        
        .mobile-login-btn:hover {
            background: linear-gradient(135deg, #4338ca 0%, #7c3aed 100%) !important;
            color: white !important;
        }
        
        /* Hover effect for desktop */
        @media (min-width: 1024px) {
            .dropdown:hover .dropdown-menu {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
        }
        
        /* Ensure no conflicting styles */
        .login-btn * {
            color: white !important;
        }
        
        .mobile-login-btn * {
            color: white !important;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header id="header" class="fixed top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-md shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 relative">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600 font-semibold transition-colors duration-300">
                    <img src="{{ asset('img/landing/logo.png') }}" alt="Logo Desa" class="h-8 w-auto">
                    <span>Sistem Informasi Desa</span>
                </a>
                
                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="text-indigo-600 font-medium hover:text-indigo-700 transition-colors duration-300 border-b-2 border-indigo-600 pb-1">
                        Beranda
                    </a>
                    
                    @if(Auth::check())
                        <!-- User Dropdown for Authenticated Users -->
                        <div class="dropdown relative">
                            <button class="dropdown-toggle flex items-center space-x-2 text-gray-700 hover:text-indigo-600 font-medium transition-colors duration-300 focus:outline-none">
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu absolute top-full right-0 mt-2 bg-white rounded-lg shadow-xl border border-gray-200 min-w-56 z-50">
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
                                    <button type="submit" class="w-full flex items-center px-4 py-3 text-sm text-red-600 hover:text-red-700 hover:bg-red-50 transition-colors duration-200 text-left rounded-b-lg">
                                        <i class="fas fa-sign-out-alt w-4 mr-3"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Login Button for Guest Users -->
                        <a href="{{ url('/login') }}" class="login-btn">
                            Login
                        </a>
                    @endif
                </nav>
                
                <!-- Mobile Menu Button -->
                <button class="mobile-menu-toggle lg:hidden text-gray-700 hover:text-indigo-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <!-- Mobile Menu -->
                <div class="mobile-menu hidden absolute top-full left-0 right-0 bg-white border-t border-gray-200 shadow-lg z-50">

                    <div class="p-4 space-y-2">
                        <a href="{{ url('/') }}" class="block px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                            Beranda
                        </a>
                        
                        @if(Auth::check())
                            <div>
                                <button class="mobile-dropdown-toggle w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors duration-200">
                                    <span>{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down mobile-dropdown-arrow text-sm"></i>
                                </button>
                                
                                <div class="mobile-dropdown bg-gray-50 rounded-lg mt-2 p-2 space-y-1">
                                    <a href="{{ url('/profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-indigo-600 hover:bg-white rounded-md transition-colors duration-200">
                                        <i class="fas fa-user w-4 mr-3"></i>
                                        Profil
                                    </a>
                                    <a href="{{ url('/surat') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-indigo-600 hover:bg-white rounded-md transition-colors duration-200">
                                        <i class="fas fa-file-alt w-4 mr-3"></i>
                                        Pengajuan Surat
                                    </a>
                                    <a href="{{ url('/complaint') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-indigo-600 hover:bg-white rounded-md transition-colors duration-200">
                                        <i class="fas fa-comment-alt w-4 mr-3"></i>
                                        Pengaduan
                                    </a>
                                    <a href="{{ url('/change-password') }}" class="flex items-center px-4 py-2 text-sm text-gray-600 hover:text-indigo-600 hover:bg-white rounded-md transition-colors duration-200">
                                        <i class="fas fa-lock w-4 mr-3"></i>
                                        Ubah Password
                                    </a>
                                    <form action="{{ url('/logout') }}" method="POST" class="w-full">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:text-red-700 hover:bg-white rounded-md transition-colors duration-200 text-left">
                                            <i class="fas fa-sign-out-alt w-4 mr-3"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ url('/login') }}" class="mobile-login-btn">
                                Login
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const mobileMenu = document.querySelector('.mobile-menu');
            const mobileMenuIcon = mobileMenuToggle.querySelector('i');
            
            // Desktop dropdown elements
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const dropdownArrow = document.querySelector('.dropdown-arrow');
            
            // Mobile dropdown elements
            const mobileDropdownToggle = document.querySelector('.mobile-dropdown-toggle');
            const mobileDropdown = document.querySelector('.mobile-dropdown');
            const mobileDropdownArrow = document.querySelector('.mobile-dropdown-arrow');
            
            // Mobile menu toggle
            if (mobileMenuToggle && mobileMenu) {
                mobileMenuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
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
            
            // Desktop dropdown toggle
            if (dropdownToggle && dropdownMenu) {
                dropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const isOpen = dropdownMenu.classList.contains('show');
                    
                    if (isOpen) {
                        dropdownMenu.classList.remove('show');
                        if (dropdownArrow) dropdownArrow.classList.remove('rotate');
                    } else {
                        dropdownMenu.classList.add('show');
                        if (dropdownArrow) dropdownArrow.classList.add('rotate');
                    }
                });
            }
            
            // Mobile dropdown toggle
            if (mobileDropdownToggle && mobileDropdown) {
                mobileDropdownToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const isOpen = mobileDropdown.classList.contains('show');
                    
                    if (isOpen) {
                        mobileDropdown.classList.remove('show');
                        if (mobileDropdownArrow) mobileDropdownArrow.classList.remove('rotate');
                    } else {
                        mobileDropdown.classList.add('show');
                        if (mobileDropdownArrow) mobileDropdownArrow.classList.add('rotate');
                    }
                });
            }
            
            // Close menus when clicking outside
            document.addEventListener('click', function(event) {
                // Close desktop dropdown
                if (dropdownMenu && dropdownToggle && !dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                    if (dropdownArrow) dropdownArrow.classList.remove('rotate');
                }
                
                // Close mobile menu
                if (mobileMenu && mobileMenuToggle && !mobileMenuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.remove('show');
                    if (mobileMenuIcon) {
                        mobileMenuIcon.classList.remove('fa-times');
                        mobileMenuIcon.classList.add('fa-bars');
                    }
                    
                    // Also close mobile dropdown
                    if (mobileDropdown) {
                        mobileDropdown.classList.remove('show');
                        if (mobileDropdownArrow) mobileDropdownArrow.classList.remove('rotate');
                    }
                }
            });
            
            // Close mobile menu when clicking on regular links
            if (mobileMenu) {
                const mobileMenuLinks = mobileMenu.querySelectorAll('a:not(.mobile-dropdown-toggle)');
                mobileMenuLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        mobileMenu.classList.remove('show');
                        if (mobileMenuIcon) {
                            mobileMenuIcon.classList.remove('fa-times');
                            mobileMenuIcon.classList.add('fa-bars');
                        }
                    });
                });
            }
            
            // Close desktop dropdown when clicking on links
            if (dropdownMenu) {
                const desktopDropdownLinks = dropdownMenu.querySelectorAll('a, button');
                desktopDropdownLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        dropdownMenu.classList.remove('show');
                        if (dropdownArrow) dropdownArrow.classList.remove('rotate');
                    });
                });
            }
        });
    </script>
</body>
</html>