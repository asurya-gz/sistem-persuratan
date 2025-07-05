@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/service-letters.css') }}" rel="stylesheet">
@endpush

@php
    $jenisSuratMap = [
        'skck'               => 'Surat Keterangan Catatan Kepolisian',
        'sktm'               => 'Surat Keterangan Tidak Mampu',
        'domisili'           => 'Surat Keterangan Domisili',
        'kehilangan'         => 'Surat Keterangan Kehilangan',
        'kematian'           => 'Surat Keterangan Kematian',
        'kepemilikan_rumah'  => 'Surat Keterangan Kepemilikan Rumah',
        'mau_menikah'        => 'Surat Keterangan Mau Menikah',
        'penghasilan_ortu'   => 'Surat Keterangan Penghasilan Orang Tua',
        'sudah_menikah'      => 'Surat Keterangan Sudah Menikah',
        'usaha'              => 'Surat Keterangan Usaha',
    ];
@endphp


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Permohonan Surat</h1>
    </div>

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

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h6 class="card-title mb-0 fw-bold">
                        <i class="fas fa-file-alt me-2"></i>Detail Permohonan Surat
                    </h6>
                    <a href="{{ route('admin.surat.index') }}" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
                <div class="card-body p-4">
                    <!-- Informasi Pemohon -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <h6 class="card-title text-primary mb-3">
                                        <i class="fas fa-user me-2"></i>Informasi Pemohon
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small fw-semibold">NAMA PEMOHON</label>
                                                <p class="mb-0 fw-semibold">{{ $surat->user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small fw-semibold">TANGGAL PENGAJUAN</label>
                                                <p class="mb-0 fw-semibold">{{ $surat->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-0">
                                                <label class="form-label text-muted small fw-semibold">STATUS PERMOHONAN</label>
                                                <div>
                                                    @php
                                                        switch ($surat->status) {
                                                            case 'diajukan':
                                                                $badge = '<span class="badge px-3 py-2" style="background-color:#fff3cd; color:#856404; border: 1px solid #ffeaa7;">
                                                                            <i class="fas fa-hourglass-half me-2"></i>Diajukan
                                                                          </span>';
                                                                break;
                                                            case 'disetujui':
                                                                $badge = '<span class="badge px-3 py-2" style="background-color:#d4edda; color:#155724; border: 1px solid #c3e6cb;">
                                                                            <i class="fas fa-check-circle me-2"></i>Disetujui
                                                                          </span>';
                                                                break;
                                                            case 'ditolak':
                                                                $badge = '<span class="badge px-3 py-2" style="background-color:#f8d7da; color:#721c24; border: 1px solid #f5c6cb;">
                                                                            <i class="fas fa-times-circle me-2"></i>Ditolak
                                                                          </span>';
                                                                break;
                                                            default:
                                                                $badge = '<span class="badge bg-secondary px-3 py-2">Tidak Diketahui</span>';
                                                        }
                                                    @endphp
                                                    {!! $badge !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Surat -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card border-0" style="border-left: 4px solid #0d6efd !important;">
                                <div class="card-body">
                                    <h6 class="card-title text-primary mb-3">
                                        <i class="fas fa-file-text me-2"></i>Detail Surat
                                    </h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small fw-semibold">JENIS SURAT</label>
                                                <p class="mb-0">{{ $jenisSuratMap[$surat->jenis_surat] ?? $surat->jenis_surat }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label text-muted small fw-semibold">TUJUAN</label>
                                                <p class="mb-0">{{ $surat->tujuan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-0">
                                                <label class="form-label text-muted small fw-semibold">KETERANGAN</label>
                                                <p class="mb-0" style="line-height: 1.6;">{{ $surat->keterangan }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aksi (hanya untuk status diajukan) -->
                    @if ($surat->status === 'diajukan')
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-0" style="border-left: 4px solid #28a745 !important;">
                                    <div class="card-body">
                                        <h6 class="card-title text-success mb-3">
                                            <i class="fas fa-cogs me-2"></i>Aksi Permohonan
                                        </h6>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmApprove-{{ $surat->id }}">
                                                <i class="fas fa-check me-2"></i>Setujui Permohonan
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmReject-{{ $surat->id }}">
                                                <i class="fas fa-times me-2"></i>Tolak Permohonan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Approve --}}
                        @include('pages.service-letters.confirm-approve', ['surat' => $surat])

                        {{-- Modal Reject --}}
                        @include('pages.service-letters.confirm-reject', ['surat' => $surat])
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

<style>
.card {
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.form-label {
    font-size: 0.75rem;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }
    
    .d-flex.gap-2 {
        flex-direction: column;
    }
    
    .d-flex.gap-2 .btn {
        width: 100%;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 0.5rem;
    }
    
    .card-header .btn {
        align-self: flex-end;
    }
}
</style>