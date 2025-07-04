<!-- Header -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('img/landing/logo.png') }}" alt="Logo Desa" class="img-fluid">
            <span>Sistem Informasi Desa</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ url('/') }}">Beranda</a></li>
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#"><span>{{ Auth::user()->name }}</span> <i class="fas fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ url('/profile') }}">Profil</a></li>
                            <li><a href="{{ url('/surat') }}">Pengajuan Surat</a></li>
                            <li><a href="{{ url('/complaint') }}">Pengaduan</a></li>
                            <li><a href="{{ url('/change-password') }}">Ubah Password</a></li>
                            <li>
                                <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" style="background:none; border:none; width:100%; text-align:left; padding:10px 20px; font-size:14px; color:var(--dark);">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li><a class="login-btn" href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
            <i class="fas fa-bars mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<style>
.dropdown-item {
    padding: 10px 20px;
    font-size: 14px;
    transition: 0.3s;
}
.dropdown-item:hover {
    color: #5cb874;
}
</style> 