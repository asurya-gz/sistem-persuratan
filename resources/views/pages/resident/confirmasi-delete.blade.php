<!-- Modal -->
<div class="modal fade" id="confirmasidelete-{{ $item->id }}" tabindex="-1" aria-labelledby="confirmasideleteLabel" aria-hidden="true">
  <div class="modal-dialog">
      <form action="/resident/{{ $item->id }}" method="post">
      @csrf
      @method('DELETE')
        <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="confirmasideletelLabel">Konfirmasi hapus</h4>
        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <span>Apakah anda yakin ingin menghapus data ini</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">tutup</button>
        <button type="submit" class="btn btn-outline-danger">ya hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>
