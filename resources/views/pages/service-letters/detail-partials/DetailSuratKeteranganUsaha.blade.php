{{-- resources/views/user/surat/DetailUsaha.blade.php --}}

<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="fas fa-info-circle me-2 fa-lg"></i>
    <div>
        <strong>Informasi:</strong> Data detail Surat Keterangan Usaha ditampilkan di bawah ini.
    </div>
</div>

@if ($data)
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <tbody>
                {{-- Data Pribadi --}}
                <tr>
                    <th style="width: 250px;">NIK</th>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td>{{ $data->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $data->tanggal_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $data->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $data->agama }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>{{ $data->status_perkawinan }}</td>
                </tr>
                <tr>
                    <th>Warga Negara</th>
                    <td>{{ $data->warga_negara }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $data->pekerjaan }}</td>
                </tr>
                <tr>
                    <th>Alamat Tempat Tinggal</th>
                    <td>{{ $data->alamat }}</td>
                </tr>

                {{-- Data Usaha --}}
                <tr class="table-secondary">
                    <th colspan="2" class="text-center">Informasi Usaha</th>
                </tr>
                <tr>
                    <th>Nama Usaha</th>
                    <td>{{ $data->nama_usaha }}</td>
                </tr>
                <tr>
                    <th>Jenis Usaha</th>
                    <td>{{ $data->jenis_usaha }}</td>
                </tr>
                <tr>
                    <th>Alamat Usaha</th>
                    <td>{{ $data->alamat_usaha }}</td>
                </tr>
                <tr>
                    <th>Penanggung Jawab</th>
                    <td>{{ $data->penanggung_jawab }}</td>
                </tr>
                <tr>
                    <th>Omset</th>
                    <td>Rp {{ number_format($data->omset, 2, ',', '.') }}</td>
                </tr>

                {{-- Kontak --}}
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
            <strong>Data Usaha belum tersedia.</strong> Silakan lengkapi formulir terlebih dahulu.
        </div>
    </div>
@endif
