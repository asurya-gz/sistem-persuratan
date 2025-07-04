@extends('layouts.app')

{{-- Include CSS file --}}
@push('styles')
    <link href="{{ asset('css/account-request.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Permintaan Akun</h1>
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

    <!-- TABEL DATA PERMINTAAN AKUN -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4 account-request-card">
                <div class="card-body"> 
                    <div class="table-responsive"> 
                        <table class="table table-hover account-request-table">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 30%;">Nama</th>
                                    <th style="width: 35%;">Email</th>
                                    <th style="width: 30%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->isEmpty())
                                    <tr>
                                        <td colspan="4" class="account-request-no-data">
                                            <div>
                                                <i class="fas fa-user-clock"></i>
                                                <p class="mb-0">Tidak Ada Permintaan Akun</p>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                                            <td>
                                                <div class="account-request-user-name">{{ $item->name }}</div>
                                            </td>
                                            <td>
                                                <div class="account-request-user-email">{{ $item->email }}</div>
                                            </td>
                                            <td>
                                                <div class="account-request-actions">
                                                    <!-- Tombol Tolak -->
                                                    <button type="button" class="btn account-request-btn account-request-btn-reject" data-bs-toggle="modal" data-bs-target="#confirmasireject-{{ $item->id }}">
                                                        <i class="fas fa-times-circle me-1"></i> Tolak
                                                    </button>
                                                    <!-- Tombol Setuju -->
                                                    <button type="button" class="btn account-request-btn account-request-btn-approve" data-bs-toggle="modal" data-bs-target="#confirmasiapprove-{{ $item->id }}">
                                                        <i class="fas fa-check-circle me-1"></i> Setuju
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Include modal konfirmasi --}}
                                        @include('pages.account-request.confirmasi-approve')
                                        @include('pages.account-request.confirmasi-reject')
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