@extends('layouts.app')

@section('content')

{{-- Tambahkan ini kalau belum --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<link rel="stylesheet" href="{{ asset('css/change-password.css') }}">

<div class="container animate__animated animate__fadeInDown mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card glass-card p-4 text-white">
                <h2 class="text-center mb-4 fw-bold text-dark animate__animated animate__fadeInDown">
                    <i class="fas fa-lock me-2 text-primary"></i> Ubah Password
                </h2>

                {{-- Notifikasi berhasil --}}
                @if (session('success'))
                <script>
                    Swal.fire({
                        title: "Berhasil",
                        text: "{{ session('success') }}",
                        icon: "success",
                        toast: true,
                        timer: 3000,
                        position: 'top-end',
                        showConfirmButton: false,
                    });
                </script>
                @endif

                {{-- Notifikasi error --}}
                @if (session('error'))
                <script>
                    Swal.fire({
                        title: "Gagal",
                        text: "{{ session('error') }}",
                        icon: "error",
                        toast: true,
                        timer: 3000,
                        position: 'top-end',
                        showConfirmButton: false,
                    });
                </script>
                @endif

                <form action="/change-password/{{ auth()->user()->id }}" method="POST">
                    @csrf

                    {{-- Password Lama --}}
                    <div class="mb-3">
                        <label for="old_password" class="text-dark">Password Lama</label>
                        <div class="input-group">
                            <input type="password" name="old_password" id="old_password"
                                class="form-control @error('old_password') is-invalid @enderror"
                                placeholder="Password Lama">
                            <span class="input-group-text toggle-password" data-target="old_password">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('old_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password Baru --}}
                    <div class="mb-4">
                        <label for="new_password" class="text-dark">Password Baru</label>
                        <div class="input-group">
                            <input type="password" name="new_password" id="new_password"
                                class="form-control @error('new_password') is-invalid @enderror"
                                placeholder="Password Baru">
                            <span class="input-group-text toggle-password" data-target="new_password">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('new_password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="/dashboard" class="btn btn-light">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- JS untuk toggle eye --}}
<script>
    document.querySelectorAll('.toggle-password').forEach(btn => {
        btn.addEventListener('click', function () {
            const inputId = this.dataset.target;
            const input = document.getElementById(inputId);
            const icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
</script>

@endsection
