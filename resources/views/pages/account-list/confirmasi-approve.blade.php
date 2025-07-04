<!-- Modal Approve Menyetujui akun -->
<div class="modal fade" id="confirmasiapprove-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmasiapproveLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/account-request/approval/{{ $item->id }}" method="POST">
      @csrf
      <div class="modal-content shadow-lg rounded-4 border-0 animate__animated animate__fadeInDown">
        <div class="modal-header bg-success text-white rounded-top-4">
          <h5 class="modal-title" id="confirmasiapproveLabel">
            <i class="fas fa-check-circle me-2"></i> Konfirmasi Aktifkan Akun
          </h5>
          <button type="button" class="btn btn-defaault" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="for" value="activate">
          <p class="mb-0 fs-6">Apakah Anda yakin ingin <strong>Mengaktifkan</strong> akun ini?</p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i> Batal</button>
          <button type="submit" class="btn btn-success shadow-sm">
            <i class="fas fa-check me-1"></i> Ya, Aktifkan</button>
        </div>
      </div>
    </form>
  </div>
</div>
