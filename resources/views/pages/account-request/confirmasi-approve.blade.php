<!-- Modal Approve Menyetujui akun -->
<div class="modal fade" id="confirmasiapprove-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmasiapproveLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/account-request/approval/{{ $item->id }}" method="POST">
      @csrf
      <div class="modal-content shadow-lg rounded-4 border-0 animate__animated animate__fadeInDown">
        <div class="modal-header bg-success text-white rounded-top-4">
          <h5 class="modal-title" id="confirmasiapproveLabel">
            <i class="fas fa-check-circle me-2"></i> Konfirmasi Persetujuan
          </h5>
          <button type="button" class="btn btn-defaault" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="for" value="approve">
          <p class="mb-0 fs-6">Apakah Anda yakin ingin <strong>menyetujui</strong> akun ini?</p>
          <div class="form-group mt-3">
            <label for="resident_id">Pilih Penduduk</label>
            <select name="resident_id" id="resident_id" class="form-control">
              <option value="">Tidak Ada</option>
              @foreach ($residents as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
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
