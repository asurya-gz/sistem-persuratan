@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/service-letters.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pelayanan Surat</h1>
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
            <div class="card shadow mb-4 account-list-card">
                <div class="card-body">

                    {{-- Filter --}}
                    <div class="mb-4">
                        <button class="btn btn-outline-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false">
                            <i class="fas fa-filter me-2"></i>Filter Data
                        </button>

                        <div class="collapse" id="filterCollapse">
                            <div class="card card-body">
                                <form method="GET" action="{{ route('admin.surat.index') }}">
                                    <div class="row g-2 align-items-end">
                                        <div class="col-md-4">
                                            <label for="nama" class="form-label">Nama Pemohon</label>
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Cari nama pemohon" value="{{ request('nama') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Semua Status</option>
                                                <option value="diajukan" {{ request('status') == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                                                <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ request('tanggal') }}">
                                        </div>
                                        <div class="col-auto mt-4">
                                            <div class="d-flex align-items-center">
                                                <button type="submit" class="btn btn-primary" title="Terapkan Filter" style="margin-right: 0.5rem;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <a href="{{ route('admin.surat.index') }}" class="btn btn-outline-secondary" title="Reset Filter">
                                                    <i class="fas fa-redo-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Surat --}}
                    <div class="table-responsive" style="max-height: 600px; overflow-y: auto;">
                        <table class="table table-hover account-list-table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 30%;">Nama Pemohon</th>
                                    <th style="width: 25%;">Tanggal Diajukan</th>
                                    <th style="width: 15%;">Status</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($surats as $surat)
                                    @php
                                        $btnDetail = '
                                            data-name="' . e($surat->user->name) . '"
                                            data-date="' . e($surat->created_at->format('d M Y')) . '"
                                            data-status="' . ucfirst($surat->status) . '"
                                            data-jenis="' . e($surat->jenis_surat) . '"
                                            data-tujuan="' . e($surat->tujuan) . '"
                                            data-keterangan="' . e($surat->keterangan) . '"';
                                    @endphp

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $surat->user->name }}</strong></td>
                                        <td>{{ $surat->created_at->format('d M Y') }}</td>
                                        <td>
                                            @php
                                                switch ($surat->status) {
                                                    case 'diajukan':
                                                        $badge = '<span class="px-3 py-1 rounded-pill text-sm fw-semibold d-inline-flex align-items-center" style="background-color:#fff3cd; color:#856404;">
                                                                    <i class="fas fa-hourglass-half me-2"></i> Diajukan
                                                                  </span>';
                                                        break;
                                                    case 'disetujui':
                                                        $badge = '<span class="px-3 py-1 rounded-pill text-sm fw-semibold d-inline-flex align-items-center" style="background-color:#d4edda; color:#155724;">
                                                                    <i class="fas fa-check-circle me-2"></i> Disetujui
                                                                  </span>';
                                                        break;
                                                    case 'ditolak':
                                                        $badge = '<span class="px-3 py-1 rounded-pill text-sm fw-semibold d-inline-flex align-items-center" style="background-color:#f8d7da; color:#721c24;">
                                                                    <i class="fas fa-times-circle me-2"></i> Ditolak
                                                                  </span>';
                                                        break;
                                                    default:
                                                        $badge = '<span class="badge bg-secondary">Tidak Diketahui</span>';
                                                }
                                            @endphp
                                            {!! $badge !!}
                                        </td>
                                        <td>
                                            @if ($surat->status === 'diajukan')
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Aksi
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <button type="button"
                                                                class="dropdown-item text-info btn-detail"
                                                                {!! $btnDetail !!}
                                                                data-bs-toggle="modal" data-bs-target="#detailModal">
                                                                Detail
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#confirmReject-{{ $surat->id }}">
                                                                Tolak
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#confirmApprove-{{ $surat->id }}">
                                                                Terima
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @else
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary btn-detail"
                                                    {!! $btnDetail !!}
                                                    data-bs-toggle="modal" data-bs-target="#detailModal">
                                                    Detail
                                                </button>
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Approve --}}
                                    @include('pages.service-letters.confirm-approve', ['surat' => $surat])

                                    {{-- Modal Reject --}}
                                    @include('pages.service-letters.confirm-reject', ['surat' => $surat])
                                @empty
                                    <tr>
                                        <td colspan="5" class="account-no-data">
                                            <div>
                                                <i class="fas fa-envelope-open-text"></i>
                                                <p class="mb-0">Belum ada data surat.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    @include('pages.service-letters.modal-detail')
@endsection

@push('scripts')
<script>
function updateStatusBadge(status) {
    const modalStatus = document.getElementById('modalStatus');
    modalStatus.className = 'badge px-3 py-2';

    switch(status.toLowerCase()) {
        case 'diajukan':
            modalStatus.classList.add('bg-warning', 'text-dark');
            modalStatus.innerHTML = '<i class="fas fa-hourglass-half me-1"></i>' + status;
            break;
        case 'disetujui':
            modalStatus.classList.add('bg-success');
            modalStatus.innerHTML = '<i class="fas fa-check-circle me-1"></i>' + status;
            break;
        case 'ditolak':
            modalStatus.classList.add('bg-danger');
            modalStatus.innerHTML = '<i class="fas fa-times-circle me-1"></i>' + status;
            break;
        default:
            modalStatus.classList.add('bg-secondary');
            modalStatus.innerHTML = status;
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const detailButtons = document.querySelectorAll(".btn-detail");

    detailButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            document.getElementById("modalName").textContent = this.dataset.name;
            document.getElementById("modalDate").textContent = this.dataset.date;
            document.getElementById("modalJenis").textContent = this.dataset.jenis;
            document.getElementById("modalTujuan").textContent = this.dataset.tujuan;
            document.getElementById("modalKeterangan").textContent = this.dataset.keterangan;
            updateStatusBadge(this.dataset.status);
        });
    });
});
</script>
@endpush
