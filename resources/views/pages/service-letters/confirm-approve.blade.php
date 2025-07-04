<!-- Modal Approve - COPY DARI REJECT -->
<div class="modal fade" id="confirmApprove-{{ $surat->id }}" tabindex="-1" aria-labelledby="confirmApproveLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<form action="{{ route('admin.surat.update_status', ['id' => $surat->id, 'status' => 'disetujui']) }}" method="POST">
@csrf
<div class="modal-content shadow-lg rounded-4 border-0 animate__animated animate__fadeInDown">
<div class="modal-header bg-success text-white rounded-top-4">
<h5 class="modal-title" id="confirmApproveLabel">
<i class="fas fa-check-circle me-2"></i> Konfirmasi Persetujuan
</h5>
<button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<p class="mb-0 fs-6">Apakah Anda yakin ingin <strong>menyetujui</strong> surat ini dari <strong>{{ $surat->user->name }}</strong>?</p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
<i class="fas fa-times me-1"></i> Batal
</button>
<button type="submit" class="btn btn-success shadow-sm">
<i class="fas fa-check me-1"></i> Ya, Setujui
</button>
</div>
</div>
</form>
</div>
</div>