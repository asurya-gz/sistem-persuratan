@extends('landing.layouts.main')

@section('styles')
<style>
    .complaint-section {
        padding: 120px 0 60px;
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    
    .form-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15);
        transition: all 0.3s;
    }
    
    .form-card:hover {
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
    }
    
    .form-header {
        background-color: #2e61a0;
        color: white;
        border-radius: 15px 15px 0 0;
        padding: 25px;
    }
    
    .form-header h2 {
        margin-bottom: 0;
        font-size: 24px;
        font-weight: 600;
    }
    
    .form-body {
        padding: 30px;
    }
    
    .btn-submit {
        background-color: #2e61a0;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-submit:hover {
        background-color: #1d4b81;
        transform: translateY(-3px);
    }
    
    .btn-cancel {
        border: 1px solid #6c757d;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-cancel:hover {
        background-color: #f8f9fa;
    }
    
    .custom-file-upload {
        position: relative;
    }
    
    .custom-file-upload .form-control {
        padding-right: 100px;
    }
    
    .custom-file-label {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endsection

@section('content')
<section class="complaint-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card form-card">
                    <div class="form-header">
                        <h2><i class="fas fa-bullhorn me-2"></i> Buat Pengaduan Baru</h2>
                    </div>
                    <div class="form-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="/complaint" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            @method('POST')
                            
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Judul Pengaduan</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan judul pengaduan" value="{{ old('title')}}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Isi Pengaduan</label>
                                <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror" placeholder="Jelaskan secara detail masalah yang ingin Anda adukan" required>{{ old('content')}}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                <div class="form-text mt-1">Berikan penjelasan selengkap mungkin, termasuk lokasi, waktu kejadian, dan pihak-pihak yang terlibat.</div>
                            </div>

                            <div class="mb-4">
                                <label for="photo_proof" class="form-label fw-bold">Bukti Foto (Opsional)</label>
                                <div class="custom-file-upload">
                                    <input type="file" name="photo_proof" class="form-control @error('photo_proof') is-invalid @enderror" id="photo_proof">
                                    <div id="selectedFileName" class="form-text mt-1">Format yang didukung: JPG, PNG, JPEG. Maks: 2MB</div>
                                </div>
                                @error('photo_proof')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between mt-5">
                                <a href="/complaint" class="btn btn-cancel text-dark">
                                    <i class="fas fa-arrow-left me-2"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-submit text-white">
                                    <i class="fas fa-paper-plane me-2"></i> Kirim Pengaduan
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
    
    // Display file name
    document.getElementById('photo_proof').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || "Format yang didukung: JPG, PNG, JPEG. Maks: 2MB";
        document.getElementById('selectedFileName').textContent = fileName;
    });
</script>
@endsection 