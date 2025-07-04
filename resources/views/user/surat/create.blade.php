@extends('landing.layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/form-surat.css') }}">
@endsection

@section('content')
<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card form-card">
                    <div class="form-header">
                        <h2><i class="fas fa-file-alt me-2"></i> Ajukan Surat</h2>
                    </div>
                    <div class="form-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('surat.store') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-4">
                                <label for="jenis_surat" class="form-label fw-bold">Jenis Surat</label>
                                <select name="jenis_surat" id="jenis_surat" class="form-select form-control @error('jenis_surat') is-invalid @enderror" required>
                                    <option value="" selected disabled>-- Pilih Jenis Surat --</option>
                                    <option value="Surat Keterangan Domisili">Surat Keterangan Domisili</option>
                                    <option value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                    <option value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                    <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                                    <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                                    <option value="Surat Pengantar">Surat Pengantar</option>
                                </select>
                                @error('jenis_surat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="tujuan" class="form-label fw-bold">Tujuan</label>
                                <input type="text" name="tujuan" id="tujuan" class="form-control @error('tujuan') is-invalid @enderror" placeholder="Contoh: Untuk keperluan administrasi perbankan" value="{{ old('tujuan') }}" required>
                                @error('tujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Berikan detail tambahan mengenai pengajuan surat ini" required>{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text mt-1">Berikan penjelasan secara detail untuk mempercepat proses persetujuan.</div>
                            </div>

                            <div class="d-flex justify-content-between mt-5">
                                <a href="{{ route('surat.index') }}" class="btn btn-cancel text-dark">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-submit text-white">
                                    <i class="fas fa-paper-plane me-2"></i> Ajukan Surat
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    // Form validation
    (function() {
        'use strict';
        
        var forms = document.querySelectorAll('.needs-validation');
        
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>
@endsection 