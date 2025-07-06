{{-- resources/views/user/surat/DetailMauMenikah.blade.php --}}

<div class="alert alert-info d-flex align-items-center" role="alert">
    <i class="fas fa-info-circle me-2 fa-lg"></i>
    <div>
        <strong>Informasi:</strong> Data detail Surat Keterangan Mau Menikah ditampilkan di bawah ini.
    </div>
</div>

@if ($data)
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <tbody>
                <tr>
                    <th style="width: 250px;">Tanggal Pernikahan</th>
                    <td>{{ $data->tanggal_pernikahan ? \Carbon\Carbon::parse($data->tanggal_pernikahan)->format('d-m-Y') : '-' }}</td>
                </tr>
                
                {{-- Data Pria --}}
                <tr class="table-secondary">
                    <th colspan="2" class="text-center">Data Pria</th>
                </tr>
                <tr>
                    <th>Nama Pria</th>
                    <td>{{ $data->nama_pria }}</td>
                </tr>
                <tr>
                    <th>NIK Pria</th>
                    <td>{{ $data->nik_pria }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir Pria</th>
                    <td>{{ $data->tempat_lahir_pria }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir Pria</th>
                    <td>{{ $data->tanggal_lahir_pria ? \Carbon\Carbon::parse($data->tanggal_lahir_pria)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Warga Negara Pria</th>
                    <td>{{ $data->warga_negara_pria }}</td>
                </tr>
                <tr>
                    <th>Agama Pria</th>
                    <td>{{ $data->agama_pria }}</td>
                </tr>
                <tr>
                    <th>Alamat Pria</th>
                    <td>{{ $data->alamat_pria }}</td>
                </tr>

                {{-- Data Wanita --}}
                <tr class="table-secondary">
                    <th colspan="2" class="text-center">Data Wanita</th>
                </tr>
                <tr>
                    <th>Nama Wanita</th>
                    <td>{{ $data->nama_wanita }}</td>
                </tr>
                <tr>
                    <th>NIK Wanita</th>
                    <td>{{ $data->nik_wanita }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahir Wanita</th>
                    <td>{{ $data->tempat_lahir_wanita }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir Wanita</th>
                    <td>{{ $data->tanggal_lahir_wanita ? \Carbon\Carbon::parse($data->tanggal_lahir_wanita)->format('d-m-Y') : '-' }}</td>
                </tr>
                <tr>
                    <th>Warga Negara Wanita</th>
                    <td>{{ $data->warga_negara_wanita }}</td>
                </tr>
                <tr>
                    <th>Agama Wanita</th>
                    <td>{{ $data->agama_wanita }}</td>
                </tr>
                <tr>
                    <th>Alamat Wanita</th>
                    <td>{{ $data->alamat_wanita }}</td>
                </tr>

                {{-- Lokasi Pernikahan & Kontak --}}
                <tr>
                    <th>Alamat Pernikahan</th>
                    <td>{{ $data->alamat_pernikahan }}</td>
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
            <strong>Data Mau Menikah belum tersedia.</strong> Silakan lengkapi formulir terlebih dahulu.
        </div>
    </div>
@endif
