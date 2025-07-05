@extends('landing.layouts.main')

@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-white flex items-center justify-center">
                    <i class="fas fa-id-card-alt mr-3"></i>
                    Persyaratan Keterangan Usaha
                </h2>
                <p class="text-indigo-100 mt-2">Silakan lengkapi form berikut ini sesuai dengan dokumen Anda</p>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8">
                <form method="POST" action="#" class="space-y-6" id="skckForm">
                    @csrf

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-id-card text-indigo-600 mr-2"></i>
                            NIK
                        </label>
                        <input type="text" name="nik" id="nik"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200"
                               placeholder="Masukkan NIK Anda">
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>
                                Tempat Lahir
                            </label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="Contoh: Semarang">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-venus-mars text-indigo-600 mr-2"></i>
                            Jenis Kelamin
                        </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                       class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                       class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Agama -->
                    <div class="form-group">
                        <label for="agama" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-praying-hands text-indigo-600 mr-2"></i>
                            Agama
                        </label>
                        <select name="agama" id="agama"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled selected>-- Pilih Agama --</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>

                    <!-- Warga Negara -->
                    <div class="form-group">
                        <label for="warga_negara" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-flag text-indigo-600 mr-2"></i>
                            Warga Negara
                        </label>
                        <input type="text" name="warga_negara" id="warga_negara"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="Contoh: Indonesia">
                    </div>

                    <!-- Pekerjaan -->
                    <div class="form-group">
                        <label for="pekerjaan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-briefcase text-indigo-600 mr-2"></i>
                            Pekerjaan
                        </label>
                        <input type="text" name="pekerjaan" id="pekerjaan"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                               placeholder="Contoh: Mahasiswa / Karyawan">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-home text-indigo-600 mr-2"></i>
                            Alamat
                        </label>
                        <textarea name="alamat" id="alamat" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                                  placeholder="Alamat lengkap sesuai KTP"></textarea>
                    </div>

                    <!-- Status Perkawinan -->
<div class="form-group">
    <label for="status_perkawinan" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-ring text-indigo-600 mr-2"></i>
        Status Perkawinan
    </label>
    <select name="status_perkawinan" id="status_perkawinan"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        <option value="" disabled selected>-- Pilih Status --</option>
        <option value="Belum Kawin">Belum Kawin</option>
        <option value="Kawin">Kawin</option>
        <option value="Cerai Hidup">Cerai Hidup</option>
        <option value="Cerai Mati">Cerai Mati</option>
    </select>
</div>

<!-- Nama Usaha -->
<div class="form-group">
    <label for="nama_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-store text-indigo-600 mr-2"></i>
        Nama Usaha
    </label>
    <input type="text" name="nama_usaha" id="nama_usaha"
           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
           placeholder="Contoh: Warung Sembako Makmur">
</div>

<!-- Jenis Usaha -->
<div class="form-group">
    <label for="jenis_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-industry text-indigo-600 mr-2"></i>
        Jenis Usaha
    </label>
    <input type="text" name="jenis_usaha" id="jenis_usaha"
           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
           placeholder="Contoh: Dagang / Jasa / Produksi">
</div>

<!-- Omset -->
<div class="form-group">
    <label for="omset" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-money-bill-wave text-indigo-600 mr-2"></i>
        Omset Perbulan (Rp)
    </label>
    <input type="number" name="omset" id="omset"
           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
           placeholder="Contoh: 10000000">
</div>

<!-- Penanggung Jawab -->
<div class="form-group">
    <label for="penanggung_jawab" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-user-check text-indigo-600 mr-2"></i>
        Penanggung Jawab
    </label>
    <input type="text" name="penanggung_jawab" id="penanggung_jawab"
           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
           placeholder="Nama penanggung jawab usaha">
</div>

<!-- Alamat Usaha -->
<div class="form-group">
    <label for="alamat_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
        <i class="fas fa-map text-indigo-600 mr-2"></i>
        Alamat Usaha
    </label>
    <textarea name="alamat_usaha" id="alamat_usaha" rows="4"
              class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
              placeholder="Alamat lengkap lokasi usaha"></textarea>
</div>

                    <!-- No Telp & Email -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone text-indigo-600 mr-2"></i>
                                No. Telepon
                            </label>
                            <input type="text" name="no_telp" id="no_telp"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-600 mr-2"></i>
                                Email
                            </label>
                            <input type="email" name="email" id="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                   placeholder="contoh@email.com">
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors duration-200 border border-gray-300 hover:border-gray-400">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Simpan Persyaratan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
