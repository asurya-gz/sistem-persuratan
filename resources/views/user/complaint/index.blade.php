@extends('landing.layouts.main')

@section('styles')
<style>
    .complaint-section {
        padding: 120px 0 60px;
        min-height: 100vh;
        background-color: #f8f9fa;
    }
    
    .card-dashboard {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        overflow: hidden;
    }
    
    .card-dashboard:hover {
        box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }
    
    .card-header {
        background-color: #2e61a0;
        color: white;
        border-bottom: none;
        padding: 1.25rem;
    }
    
    .btn-add {
        background-color: #59b963;
        color: white;
        border-radius: 50px;
        padding: 10px 25px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-add:hover {
        background-color: #489652;
        color: white;
        transform: translateY(-3px);
    }
    
    .status-badge {
        padding: 8px 15px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 12px;
    }
    
    .status-new {
        background-color: #cce5ff;
        color: #004085;
    }
    
    .status-process {
        background-color: #fff3cd;
        color: #856404;
    }
    
    .status-done {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .table th {
        font-weight: 600;
        color: #495057;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 0;
    }
    
    .empty-state i {
        font-size: 80px;
        color: #dee2e6;
        margin-bottom: 20px;
    }
    
    .empty-state h4 {
        font-size: 24px;
        color: #6c757d;
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: #adb5bd;
        margin-bottom: 30px;
        font-size: 16px;
    }
    
    .btn-action {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 14px;
        transition: all 0.3s;
    }
    
    .btn-view {
        background-color: #2e61a0;
        color: white;
    }
    
    .btn-view:hover {
        background-color: #1d4b81;
        color: white;
    }
    
    .btn-edit {
        background-color: #ffc107;
        color: #212529;
    }
    
    .btn-edit:hover {
        background-color: #e0a800;
        color: #212529;
    }
    
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
    
    .btn-delete:hover {
        background-color: #c82333;
        color: white;
    }
    
    .complaint-content {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endsection

@section('content')
<section class="complaint-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-primary fw-bold mb-0">Daftar Pengaduan</h2>
                    <a href="/complaint/create" class="btn btn-add">
                        <i class="fas fa-plus-circle me-2"></i> Buat Pengaduan Baru
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card card-dashboard">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-bullhorn me-2"></i> Pengaduan yang Anda Buat</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        
                        @if(isset($complaints) && count($complaints) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="width: 20%">Judul</th>
                                            <th style="width: 30%">Isi Pengaduan</th>
                                            <th style="width: 15%">Tanggal</th>
                                            <th style="width: 15%">Status</th>
                                            <th style="width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($complaints as $index => $complaint)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $complaint->title }}</td>
                                                <td>
                                                    <div class="complaint-content">{{ $complaint->content }}</div>
                                                </td>
                                                <td>{{ $complaint->created_at->format('d M Y') }}</td>
                                                <td>
                                                    @if($complaint->status == 'new')
                                                        <span class="status-badge status-new">Baru</span>
                                                    @elseif($complaint->status == 'process')
                                                        <span class="status-badge status-process">Diproses</span>
                                                    @elseif($complaint->status == 'done')
                                                        <span class="status-badge status-done">Selesai</span>
                                                    @else
                                                        <span class="status-badge status-rejected">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex" style="gap: 5px;">
                                                        @if($complaint->status == 'new')
                                                            <a href="/complaint/{{ $complaint->id }}" class="btn btn-edit btn-action">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-delete btn-action" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $complaint->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                            
                                                            <!-- Delete Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $complaint->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Apakah Anda yakin ingin menghapus pengaduan ini?</p>
                                                                            <p><strong>{{ $complaint->title }}</strong></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                            <form action="/complaint/{{ $complaint->id }}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <span class="text-muted small">Tidak dapat diedit</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            @if(isset($complaints) && method_exists($complaints, 'links'))
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $complaints->links() }}
                                </div>
                            @endif
                        @else
                            <div class="empty-state">
                                <i class="fas fa-bullhorn"></i>
                                <h4>Belum Ada Pengaduan</h4>
                                <p>Anda belum membuat pengaduan apapun. Silahkan klik tombol "Buat Pengaduan Baru" untuk membuat pengaduan.</p>
                                <a href="/complaint/create" class="btn btn-add">
                                    <i class="fas fa-plus-circle me-2"></i> Buat Pengaduan Baru
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