<!-- Modal Reject Menolak Surat -->
<div class="modal fade" id="confirmReject-{{ $surat->id }}" tabindex="-1" aria-labelledby="confirmRejectLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.surat.update_status', ['id' => $surat->id, 'status' => 'ditolak']) }}" method="POST">
            @csrf
            <div class="modal-content shadow-lg rounded-4 border-0 animate__animated animate__fadeInDown">
                <div class="modal-header bg-danger text-white rounded-top-4">
                    <h5 class="modal-title" id="confirmRejectLabel">
                        <i class="fas fa-times-circle me-2"></i> Konfirmasi Penolakan
                    </h5>
                </div>

                <div class="modal-body">
                    <p class="mb-0 fs-6">Apakah Anda yakin ingin <strong>menolak</strong> surat ini dari <strong>{{ $surat->user->name }}</strong>?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-danger shadow-sm">
                        <i class="fas fa-times-circle me-1"></i> Ya, Tolak
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
