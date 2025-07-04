@extends('landing.layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/user-surat.css') }}">
@endsection

@section('content')
<section class="surat-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-primary fw-bold mb-0">Daftar Pengajuan Surat</h2>
                    <a href="{{ route('surat.create') }}" class="btn btn-add">
                        <i class="fas fa-plus-circle me-2"></i> Ajukan Surat Baru
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card card-dashboard">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i> Surat yang Anda Ajukan</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if(isset($surats) && $surats->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Surat</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($surats as $index => $surat)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $surat->jenis_surat }}</td>
                                                <td>{{ $surat->tujuan }}</td>
                                                <td>{{ $surat->created_at->format('d M Y') }}</td>
                                                <td>
                            @if($surat->status == 'diajukan')
    <span class="status-badge status-pending">Menunggu</span>
@elseif($surat->status == 'disetujui')
    <span class="status-badge status-approved">Disetujui</span>
@elseif($surat->status == 'ditolak')
    <span class="status-badge status-rejected">Ditolak</span>
@endif

                                                </td>
                                                <td>{{ $surat->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                                {{ $surats->links() }}
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="fas fa-file-alt"></i>
                                <h4>Belum Ada Pengajuan Surat</h4>
                                <p>Anda belum mengajukan surat apapun. Silahkan klik tombol "Ajukan Surat Baru" untuk membuat pengajuan.</p>
                                <a href="{{ route('surat.create') }}" class="btn btn-add">
                                    <i class="fas fa-plus-circle me-2"></i> Ajukan Surat Baru
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 