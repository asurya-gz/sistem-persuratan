@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/account-list.css') }}" rel="stylesheet">
@endpush


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Akun Penduduk</h1>
    </div>

    <!-- SweetAlert2 Success Notification -->
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2500,
                showConfirmButton: false,
                timerProgressBar: true,
                position: 'top-end',
                toast: true,
                background: '#d4edda',
                color: '#155724',
            });
        </script>     
    @endif

    <!-- TABEL DATA PENDUDUK -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 account-list-card">
                <div class="card-body"> 
                    <div class="table-responsive"> 
                        <table class="table table-hover account-list-table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 25%;">Nama</th>
                                    <th style="width: 30%;">Email</th>
                                    <th style="width: 15%;">Status</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="5" class="account-no-data">
                                            <div>
                                                <i class="fas fa-users"></i>
                                                <p class="mb-0">Tidak Ada Data Akun Penduduk</p>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                            <td>
                                                <div class="font-weight-bold">{{ $item->name }}</div>
                                            </td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if ($item->status == 'approved')
                                                    <span class="btn btn-sm account-status-active">
                                                        <i class="fas fa-check-circle me-1"></i>Aktif
                                                    </span>                                                      
                                                @else
                                                    <span class="btn btn-sm account-status-inactive">
                                                        <i class="fas fa-times-circle me-1"></i>Tidak Aktif
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="account-action-buttons">
                                                    @if ($item->status == 'approved')
                                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmasireject-{{ $item->id }}">
                                                            <i class="fas fa-user-times me-1"></i> Non Aktifkan
                                                        </button>                                                    
                                                    @else
                                                        <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#confirmasiapprove-{{ $item->id }}">
                                                            <i class="fas fa-user-check me-1"></i> Aktifkan
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @include('pages.account-list.confirmasi-approve')
                                        @include('pages.account-list.confirmasi-reject')
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div> 
                </div>
                @if ($users->lastPage() > 1)
                    <div class="card-footer">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>    
                @endif
            </div> 
        </div> 
    </div>
@endsection