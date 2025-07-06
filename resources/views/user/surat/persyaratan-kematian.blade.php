@extends('landing.layouts.main')

@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-white flex items-center justify-center">
                    <i class="fas fa-id-card-alt mr-3"></i>
                    Persyaratan Keterangan Kematian
                </h2>
                <p class="text-indigo-100 mt-2">Silakan lengkapi form berikut ini sesuai dengan dokumen Anda</p>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8">
               <form method="POST" action="{{ route('kematian.store') }}" class="space-y-6">
                    @csrf
<input type="hidden" name="surats_id" value="{{ $surat->id }}">

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user text-indigo-600 mr-2"></i> Nama Lengkap
                        </label>
                        <input type="text" name="nama" id="nama"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                               placeholder="Nama lengkap almarhum/almarhumah">
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-id-card text-indigo-600 mr-2"></i> NIK
                        </label>
                        <input type="text" name="nik" id="nik"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                               placeholder="Masukkan NIK">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-venus-mars text-indigo-600 mr-2"></i> Jenis Kelamin
                        </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki" class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Perempuan" class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Umur -->
                    <div>
                        <label for="umur" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-birthday-cake text-indigo-600 mr-2"></i> Umur
                        </label>
                        <input type="number" name="umur" id="umur"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                               placeholder="Umur saat meninggal">
                    </div>

                    <!-- Pekerjaan -->
                    <div>
                        <label for="pekerjaan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-briefcase text-indigo-600 mr-2"></i> Pekerjaan
                        </label>
                        <input type="text" name="pekerjaan" id="pekerjaan"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                               placeholder="Contoh: Pensiunan / Petani">
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-home text-indigo-600 mr-2"></i> Alamat
                        </label>
                        <textarea name="alamat" id="alamat" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 resize-none"
                                  placeholder="Alamat lengkap terakhir sebelum meninggal"></textarea>
                    </div>

                    <!-- Tanggal & Waktu Kematian -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tanggal_kematian" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-times text-indigo-600 mr-2"></i> Tanggal Kematian
                            </label>
                            <input type="date" name="tanggal_kematian" id="tanggal_kematian"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="waktu_kematian" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-clock text-indigo-600 mr-2"></i> Waktu Kematian
                            </label>
                            <input type="time" name="waktu_kematian" id="waktu_kematian"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500">
                        </div>
                    </div>

                    <!-- Tempat & Penyebab Kematian -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_kematian" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i> Tempat Kematian
                            </label>
                            <input type="text" name="tempat_kematian" id="tempat_kematian"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="Contoh: Rumah / RS">
                        </div>
                        <div>
                            <label for="penyebab_kematian" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-notes-medical text-indigo-600 mr-2"></i> Penyebab Kematian
                            </label>
                            <input type="text" name="penyebab_kematian" id="penyebab_kematian"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="Contoh: Sakit / Kecelakaan">
                        </div>
                    </div>

                    <!-- Nama Pelapor & Hubungan -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="nama_pelapor" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user-check text-indigo-600 mr-2"></i> Nama Pelapor
                            </label>
                            <input type="text" name="nama_pelapor" id="nama_pelapor"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="Nama orang yang melaporkan">
                        </div>
                        <div>
                            <label for="hubungan_dengan_meninggal" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-link text-indigo-600 mr-2"></i> Hubungan dengan Almarhum
                            </label>
                            <input type="text" name="hubungan_dengan_meninggal" id="hubungan_dengan_meninggal"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="Contoh: Anak / Istri / Suami">
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone text-indigo-600 mr-2"></i> No. Telepon
                            </label>
                            <input type="text" name="no_telp" id="no_telp"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-600 mr-2"></i> Email
                            </label>
                            <input type="email" name="email" id="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500"
                                   placeholder="contoh@email.com">
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:from-indigo-700 hover:to-purple-700 transition hover:scale-105 shadow-lg">
                            <i class="fas fa-paper-plane mr-2"></i> Simpan Persyaratan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
