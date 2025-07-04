@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush

@section('content')
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    
    <!-- Welcome Message -->
    <div class="card shadow mb-4 border-0 rounded-lg">
        <div class="card-body bg-light">
            <h5 class="font-weight-bold text-primary">Selamat Datang, {{ $user->name }}!</h5>
            <p>Selamat datang di Sistem Informasi Desa. Silahkan gunakan menu di samping untuk mengakses berbagai fitur.</p>
        </div>
    </div>
    
    <!-- Content Row -->
    <div class="row">
        <!-- Total Penduduk Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 rounded-lg hover-card bg-primary text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Jumlah Penduduk</div>
                            <div class="h1 mb-0 font-weight-bold">{{ $totalResidents }}</div>
                            <div class="mt-2 small">Total warga terdaftar di sistem</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-white">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permintaan Surat Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 rounded-lg hover-card bg-danger text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Permintaan Surat</div>
                            <div class="h1 mb-0 font-weight-bold">{{ $pendingSurat }}</div>
                            <div class="mt-2 small">Menunggu untuk diproses</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-white">
                                <i class="fas fa-file-alt fa-2x text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Surat Selesai Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100 py-2 rounded-lg hover-card bg-success text-white">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                Surat Selesai</div>
                            <div class="h1 mb-0 font-weight-bold">{{ $completedSurat }}</div>
                            <div class="mt-2 small">Surat yang telah disetujui</div>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-white">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    @if($user->role_id == 1) {{-- Check if user is Admin --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 rounded-lg">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Menu Cepat Admin</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('/resident') }}" class="btn btn-primary btn-block py-3 shadow-sm hover-btn">
                                <i class="fas fa-users mr-2"></i> Kelola Data Penduduk
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('/account-request') }}" class="btn btn-success btn-block py-3 shadow-sm hover-btn">
                                <i class="fas fa-user-plus mr-2"></i> Permintaan Akun
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('/complaint') }}" class="btn btn-info btn-block py-3 shadow-sm hover-btn">
                                <i class="fas fa-bullhorn mr-2"></i> Kelola Pengaduan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection