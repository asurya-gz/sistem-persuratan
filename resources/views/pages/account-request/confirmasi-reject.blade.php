<!-- Modal Reject Menolak akun -->
<div class="modal fade" id="confirmasireject-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmasirejectLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/account-request/approval/{{ $item->id }}" method="POST">
      @csrf
      @method('POST')
      <div class="modal-content shadow-lg rounded-4 border-0 animate__animated animate__fadeInDown">
        <div class="modal-header bg-danger text-white rounded-top-4">
          <h5 class="modal-title" id="confirmasirejectLabel">
            <i class="fas fa-times-circle me-2"></i> Konfirmasi Penolakan
          </h5>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="for" value="reject">
          <p class="mb-0 fs-6">Apakah Anda yakin ingin <strong>menolak</strong> akun ini?</p>
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
