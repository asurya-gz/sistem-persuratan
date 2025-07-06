{{-- resources/views/user/surat/DetailKematian.blade.php --}}

<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="fas fa-info-circle me-2 fa-lg"></i>
    <div>
        <strong>Informasi:</strong> Data detail Surat Keterangan Kematian ditampilkan di bawah ini.
    </div>
</div>

@if ($data)
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <tbody>
                <tr>
                    <th style="width: 250px;">Nama</th>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $data->pekerjaan }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $data->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kematian</th>
                    <td>{{ $data->tanggal_kematian ? \Carbon\Carbon::parse($data->tanggal_kematian)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Waktu Kematian</th>
                    <td>{{ $data->waktu_kematian ? \Carbon\Carbon::parse($data->waktu_kematian)->format('H:i') : '-' }}</td>
                </tr>
                <tr>
                    <th>Penyebab Kematian</th>
                    <td>{{ $data->penyebab_kematian }}</td>
                </tr>
                <tr>
                    <th>Umur</th>
                    <td>{{ $data->umur }}</td>
                </tr>
                <tr>
                    <th>Tempat Kematian</th>
                    <td>{{ $data->tempat_kematian }}</td>
                </tr>
                <tr>
                    <th>Nama Pelapor</th>
                    <td>{{ $data->nama_pelapor }}</td>
                </tr>
                <tr>
                    <th>Hubungan dengan yang Meninggal</th>
                    <td>{{ $data->hubungan_dengan_meninggal }}</td>
                </tr>
                <tr>
                    <th>No. Telepon</th>
                    <td>{{ $data->no_telp ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data->email ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-warning d-flex align-items-center mt-4" role="alert">
        <i class="fas fa-exclamation-triangle me-2 fa-lg"></i>
        <div>
            <strong>Data Kematian belum tersedia.</strong> Silakan lengkapi formulir terlebih dahulu.
        </div>
    </div>
@endif
