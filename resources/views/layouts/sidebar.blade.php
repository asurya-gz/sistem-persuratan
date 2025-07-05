{{-- Import Tailwind CSS --}}
@vite('resources/css/app.css')

@php
     $menus = [
            1 => [
                (object) [
                    'title' => 'Dashboard',
                    'path' => 'dashboard',
                    'icon' => 'fas fas-fw fa-tachometer-alt',
                ],
                 (object) [
                    'title' => 'Data Penduduk',
                    'path' => 'resident',
                    'icon' => 'fas fas-fw fa-table',
                ],
                (object) [
                    'title' => 'Daftar Akun',
                    'path' => 'account-list',
                    'icon' => 'fas fa-fw fa-user',
                ],
                 (object) [
                    'title' => 'Permintaan Akun',
                    'path' => 'account-request',
                    'icon' => 'fas fa-fw fa-user',
                ],
                (object) [
                    'title' => 'Pelayanan Surat',
                    'path' => 'service-letters',
                    'icon' => 'fas fa-envelope me-2',
                ],
                (object) [
                    'title' => 'Pengaduan Warga',
                    'path' => 'complaint',
                    'icon' => 'fas fa-fw fa-scroll',
                ],
            ],
        ];
 @endphp

<!-- Sidebar dengan positioning yang tidak menutupi konten -->
<ul class="min-h-screen w-64 bg-gradient-to-br from-indigo-600 to-purple-700 shadow-2xl transition-all duration-300 ease-in-out overflow-y-auto" id="accordionSidebar">
    
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20"></div>
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, rgba(79, 70, 229, 0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(147, 51, 234, 0.1) 0%, transparent 50%);"></div>
    </div>

    <!-- Sidebar - Brand -->
    <a class="relative z-10 flex items-center justify-center px-6 py-6 text-white hover:bg-white/10 transition-all duration-300 group" href="/dashboard">
        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
            <i class="fas fa-laugh-wink text-xl text-white"></i>
        </div>
        <div class="text-lg font-bold text-white ml-3 sidebar-text">WELCOME ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="relative z-10 border-white/20 mx-6 my-0">

    <!-- Divider -->
    <hr class="relative z-10 border-white/20 mx-6 my-4">

    <!-- Heading -->
    <div class="relative z-10 px-6 py-2 mb-4">
        <h6 class="text-xs font-semibold text-indigo-200 uppercase tracking-wider sidebar-text">
            Manajemen Data
        </h6>
    </div>

    <!-- Nav Item - Tables -->
    @auth
        @foreach($menus[auth()->user()->role_id] as $menu)
            <li class="relative z-10 nav-item {{ request()->is($menu->path.'*') ? 'active' : '' }}">
                <a class="flex items-center px-6 py-3 text-white hover:bg-white/10 transition-all duration-200 group {{ request()->is($menu->path.'*') ? 'bg-white/20 shadow-lg' : '' }}" href="{{ $menu->path }}" title="{{ $menu->title }}">
                    <i class="{{ $menu->icon }} w-5 h-5 text-indigo-200 group-hover:text-white transition-colors {{ request()->is($menu->path.'*') ? 'text-white' : '' }} sidebar-icon"></i>
                    <span class="font-medium ml-3 sidebar-text">{{ $menu->title }}</span>
                </a>
            </li>
        @endforeach
    @endauth

    <!-- Divider -->
    <hr class="relative z-10 border-white/20 mx-6 my-4 hidden md:block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="relative z-10 text-center py-4 hidden md:block">
        <button class="w-10 h-10 bg-white/20 rounded-full border-0 hover:bg-white/30 transition-all duration-200 text-white" id="sidebarToggle">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

</ul>

<style>
    /* Sidebar collapsed state */
    .sidebar-collapsed {
        width: 4rem !important; /* 64px */
    }
    
    .sidebar-collapsed .sidebar-text {
        opacity: 0;
        visibility: hidden;
        width: 0;
        margin: 0;
        padding: 0;
    }
    
    .sidebar-collapsed .sidebar-icon {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
    
    .sidebar-collapsed .ml-3 {
        margin-left: 0 !important;
    }
    
    .sidebar-collapsed .px-6 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
        justify-content: center !important;
    }
    
    .sidebar-collapsed .justify-center {
        justify-content: center !important;
    }
    
    .sidebar-collapsed .mx-6 {
        margin-left: 1rem !important;
        margin-right: 1rem !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sidebar toggle functionality
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('accordionSidebar');
        const mainContent = document.querySelector('.ml-64');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function() {
                const toggleIcon = this.querySelector('i');
                
                if (sidebar.classList.contains('sidebar-collapsed')) {
                    // Expand sidebar
                    sidebar.classList.remove('sidebar-collapsed');
                    toggleIcon.classList.remove('fa-chevron-right');
                    toggleIcon.classList.add('fa-chevron-left');
                    
                    // Adjust main content margin if exists
                    if (mainContent) {
                        mainContent.style.marginLeft = '16rem'; // 256px
                    }
                } else {
                    // Collapse sidebar
                    sidebar.classList.add('sidebar-collapsed');
                    toggleIcon.classList.remove('fa-chevron-left');
                    toggleIcon.classList.add('fa-chevron-right');
                    
                    // Adjust main content margin if exists
                    if (mainContent) {
                        mainContent.style.marginLeft = '4rem'; // 64px
                    }
                }
            });
        }
    });
</script>