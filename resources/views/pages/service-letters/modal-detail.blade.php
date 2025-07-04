<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="detailModalLabel">
                    <i class="fas fa-file-alt me-3"></i>Detail Permohonan Surat
                </h5>
            </div>
            <div class="modal-body p-4">
                <!-- Informasi Pemohon -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h6 class="card-title text-primary mb-3">
                                    <i class="fas fa-user me-3"></i>Informasi Pemohon
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small fw-semibold">NAMA PEMOHON</label>
                                            <p class="mb-0 fw-semibold" id="modalName">-</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small fw-semibold">TANGGAL PENGAJUAN</label>
                                            <p class="mb-0 fw-semibold" id="modalDate">-</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-0">
                                            <label class="form-label text-muted small fw-semibold">STATUS PERMOHONAN</label>
                                            <div>
                                                <span class="badge bg-warning text-dark px-3 py-2" id="modalStatus">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Surat -->
                <div class="row">
                    <div class="col-12">
                        <div class="card border-0" style="border-left: 4px solid #0d6efd !important;">
                            <div class="card-body">
                                <h6 class="card-title text-primary mb-3">
                                    <i class="fas fa-file-text me-3"></i>Detail Surat
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small fw-semibold">JENIS SURAT</label>
                                            <p class="mb-0" id="modalJenis">-</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small fw-semibold">TUJUAN</label>
                                            <p class="mb-0" id="modalTujuan">-</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-0">
                                            <label class="form-label text-muted small fw-semibold">KETERANGAN</label>
                                            <p class="mb-0" id="modalKeterangan" style="line-height: 1.6;">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles untuk modal */
.modal-content {
    border-radius: 12px;
    overflow: hidden;
}

.modal-header {
    padding: 1.5rem;
    border-bottom: none;
    border-radius: 12px 12px 0 0 !important;
}

.modal-body {
    max-height: 70vh;
    overflow-y: auto;
}

.modal-footer {
    padding: 1rem 1.5rem;
    border-top: 1px solid #dee2e6;
    border-radius: 0 0 12px 12px !important;
}

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
    .modal-dialog {
        margin: 0.5rem;
        max-width: calc(100% - 1rem);
    }
    
    .modal-body {
        padding: 1.5rem;
    }
    
    .card-body {
        padding: 1rem;
    }
}

/* Badge styling berdasarkan status */
.badge.bg-warning {
    background-color: #fff3cd !important;
    color: #856404 !important;
    border: 1px solid #ffeaa7;
}

.badge.bg-success {
    background-color: #d4edda !important;
    color: #155724 !important;
    border: 1px solid #c3e6cb;
}

.badge.bg-danger {
    background-color: #f8d7da !important;
    color: #721c24 !important;
    border: 1px solid #f5c6cb;
}

/* Demo purposes - menampilkan modal */
.demo-modal {
    display: block !important;
    background: rgba(0,0,0,0.5);
}

.demo-modal .modal-dialog {
    transform: none !important;
}
</style>
