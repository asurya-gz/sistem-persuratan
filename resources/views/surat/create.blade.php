<form method="POST" action="{{ route('surat.store') }}">
    @csrf
    <input type="text" name="jenis_surat" placeholder="Jenis Surat">
    <input type="text" name="tujuan" placeholder="Tujuan">
    <textarea name="keterangan" placeholder="Keterangan"></textarea>
    <button type="submit">Ajukan Surat</button>
</form>