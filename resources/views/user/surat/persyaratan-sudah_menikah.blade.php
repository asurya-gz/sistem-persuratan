@extends('landing.layouts.main')

@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-white flex items-center justify-center">
                    <i class="fas fa-id-card-alt mr-3"></i>
                    Persyaratan Keterangan Sudah Menikah
                </h2>
                <p class="text-indigo-100 mt-2">Silakan lengkapi form berikut ini sesuai dengan dokumen Anda</p>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8">
                <form method="POST" action="#" class="space-y-6" id="skckForm">
                    @csrf

                   <!-- === DATA PRIA === -->
<h3 class="text-lg font-bold text-gray-700 mb-4 mt-8">Data Suami</h3>

<!-- Nama Pria -->
<div class="form-group">
    <label for="nama_pria" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
    <input type="text" name="nama_pria" id="nama_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="Nama lengkap suami">
</div>

<!-- NIK Pria -->
<div class="form-group">
    <label for="nik_pria" class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
    <input type="text" name="nik_pria" id="nik_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="NIK suami">
</div>

<!-- Tempat & Tanggal Lahir Pria -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label for="tempat_lahir_pria" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
        <input type="text" name="tempat_lahir_pria" id="tempat_lahir_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
    <div>
        <label for="tanggal_lahir_pria" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir_pria" id="tanggal_lahir_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
</div>

<!-- Warga Negara dan Agama Pria -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label for="warga_negara_pria" class="block text-sm font-semibold text-gray-700 mb-2">Warga Negara</label>
        <input type="text" name="warga_negara_pria" id="warga_negara_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="Contoh: Indonesia">
    </div>
    <div>
        <label for="agama_pria" class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
        <input type="text" name="agama_pria" id="agama_pria" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
</div>

<!-- Alamat Pria -->
<div class="form-group">
    <label for="alamat_pria" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
    <textarea name="alamat_pria" id="alamat_pria" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg"></textarea>
</div>

<!-- === DATA WANITA === -->
<h3 class="text-lg font-bold text-gray-700 mb-4 mt-8">Data Istri</h3>

<!-- Nama Wanita -->
<div class="form-group">
    <label for="nama_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
    <input type="text" name="nama_wanita" id="nama_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="Nama lengkap istri">
</div>

<!-- NIK Wanita -->
<div class="form-group">
    <label for="nik_wanita" class="block text-sm font-semibold text-gray-700 mb-2">NIK</label>
    <input type="text" name="nik_wanita" id="nik_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="NIK istri">
</div>

<!-- Tempat & Tanggal Lahir Wanita -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label for="tempat_lahir_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Tempat Lahir</label>
        <input type="text" name="tempat_lahir_wanita" id="tempat_lahir_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
    <div>
        <label for="tanggal_lahir_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir_wanita" id="tanggal_lahir_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
</div>

<!-- Warga Negara dan Agama Wanita -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label for="warga_negara_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Warga Negara</label>
        <input type="text" name="warga_negara_wanita" id="warga_negara_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="Contoh: Indonesia">
    </div>
    <div>
        <label for="agama_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Agama</label>
        <input type="text" name="agama_wanita" id="agama_wanita" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
    </div>
</div>

<!-- Alamat Wanita -->
<div class="form-group">
    <label for="alamat_wanita" class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
    <textarea name="alamat_wanita" id="alamat_wanita" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg"></textarea>
</div>

<!-- === DATA PERNIKAHAN === -->
<h3 class="text-lg font-bold text-gray-700 mb-4 mt-8">Data Pernikahan</h3>

<!-- Tanggal Pernikahan -->
<div class="form-group">
    <label for="tanggal_pernikahan" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Pernikahan</label>
    <input type="date" name="tanggal_pernikahan" id="tanggal_pernikahan" class="w-full px-4 py-3 border border-gray-300 rounded-lg">
</div>

<!-- Alamat Pernikahan -->
<div class="form-group">
    <label for="alamat_pernikahan" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Tempat Pernikahan</label>
    <textarea name="alamat_pernikahan" id="alamat_pernikahan" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg"></textarea>
</div>

<!-- Kontak -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <div>
        <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">No. Telepon</label>
        <input type="text" name="no_telp" id="no_telp" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="08xxxxxxxxxx">
    </div>
    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
        <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg" placeholder="contoh@email.com">
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
