{{-- resources/views/user/surat/DetailPenghasilanOrtu.blade.php --}}

<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="fas fa-info-circle me-2 fa-lg"></i>
    <div>
        <strong>Informasi:</strong> Data detail Surat Keterangan Penghasilan Orang Tua ditampilkan di bawah ini.
    </div>
</div>

@if ($data)
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <tbody>
                {{-- Data Orang Tua --}}
                <tr class="table-secondary">
                    <th colspan="2" class="text-center">Data Orang Tua</th>
                </tr>
                <tr>
                    <th style="width: 250px;">NIK</th>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <th>Nama Orang Tua</th>
                    <td>{{ $data->nama_orangtua }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir Orang Tua</th>
                    <td>{{ $data->tempat_lahir_orangtua }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir Orang Tua</th>
                    <td>{{ $data->tanggal_lahir_orangtua ? \Carbon\Carbon::parse($data->tanggal_lahir_orangtua)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin Orang Tua</th>
                    <td>{{ $data->jenis_kelamin_orangtua }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Orang Tua</th>
                    <td>{{ $data->pekerjaan_orangtua }}</td>
                </tr>
                <tr>
                    <th>Alamat Orang Tua</th>
                    <td>{{ $data->alamat_orangtua }}</td>
                </tr>

                {{-- Data Anak --}}
                <tr class="table-secondary">
                    <th colspan="2" class="text-center">Data Anak</th>
                </tr>
                <tr>
                    <th>Nama Anak</th>
                    <td>{{ $data->nama_anak }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir Anak</th>
                    <td>{{ $data->tempat_lahir_anak }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir Anak</th>
                    <td>{{ $data->tanggal_lahir_anak ? \Carbon\Carbon::parse($data->tanggal_lahir_anak)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin Anak</th>
                    <td>{{ $data->jenis_kelamin_anak }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan Anak</th>
                    <td>{{ $data->pekerjaan_anak }}</td>
                </tr>
                <tr>
                    <th>Alamat Anak</th>
                    <td>{{ $data->alamat_anak }}</td>
                </tr>

                {{-- Penghasilan dan Kontak --}}
                <tr>
                    <th>Jumlah Penghasilan</th>
                    <td>Rp {{ number_format($data->jumlah_penghasilan, 2, ',', '.') }}</td>
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
            <strong>Data Penghasilan Orang Tua belum tersedia.</strong> Silakan lengkapi formulir terlebih dahulu.
        </div>
    </div>
@endif
