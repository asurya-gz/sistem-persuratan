{{-- resources/views/user/surat/persyaratan-sktm.blade.php --}}

<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="fas fa-info-circle me-2 fa-lg"></i>
    <div>
        <strong>Informasi:</strong> Berikut adalah data lengkap SKTM untuk pengajuan surat ini.
    </div>
</div>

@if ($data)
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <tbody>
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
                    <td>{{ $data->jenis_kelamin ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $data->agama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>{{ $data->status_perkawinan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Warga Negara</th>
                    <td>{{ $data->warga_negara ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $data->pekerjaan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $data->alamat ?? '-' }}</td>
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
            <strong>Data SKTM belum tersedia.</strong> Silakan lengkapi formulir pengisian terlebih dahulu.
        </div>
    </div>
@endif
