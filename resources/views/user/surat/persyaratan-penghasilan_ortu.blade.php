@extends('landing.layouts.main')

@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-white flex items-center justify-center">
                    <i class="fas fa-id-card-alt mr-3"></i>
                    Formulir Keterangan Penghasilan Orang Tua
                </h2>
                <p class="text-indigo-100 mt-2">Silakan lengkapi data berikut sesuai dokumen yang dimiliki</p>
            </div>

            <div class="p-6 lg:p-8">
                <form method="POST" action="#" class="space-y-6">
                    @csrf

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-id-card text-indigo-600 mr-2"></i> NIK
                        </label>
                        <input type="text" name="nik" id="nik"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Masukkan NIK">
                    </div>

                    <!-- Data Orang Tua -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="nama_orangtua" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-user text-indigo-600 mr-2"></i> Nama Orang Tua
                            </label>
                            <input type="text" name="nama_orangtua" id="nama_orangtua"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Nama lengkap">
                        </div>
                        <div>
                            <label for="pekerjaan_orangtua" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-briefcase text-indigo-600 mr-2"></i> Pekerjaan Orang Tua
                            </label>
                            <input type="text" name="pekerjaan_orangtua" id="pekerjaan_orangtua"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Contoh: Petani / Karyawan">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir_orangtua" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i> Tempat Lahir Orang Tua
                            </label>
                            <input type="text" name="tempat_lahir_orangtua" id="tempat_lahir_orangtua"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Contoh: Semarang">
                        </div>
                        <div>
                            <label for="tanggal_lahir_orangtua" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i> Tanggal Lahir Orang Tua
                            </label>
                            <input type="date" name="tanggal_lahir_orangtua" id="tanggal_lahir_orangtua"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <!-- Jenis Kelamin Orang Tua -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-venus-mars text-indigo-600 mr-2"></i> Jenis Kelamin Orang Tua
                        </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin_orangtua" value="Laki-laki"
                                    class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin_orangtua" value="Perempuan"
                                    class="form-radio text-indigo-600">
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                    </div>

                    <!-- Alamat Orang Tua -->
                    <div>
                        <label for="alamat_orangtua" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-home text-indigo-600 mr-2"></i> Alamat Orang Tua
                        </label>
                        <textarea name="alamat_orangtua" id="alamat_orangtua" rows="4"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                            placeholder="Alamat lengkap sesuai KTP"></textarea>
                    </div>

                    <!-- Data Anak -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Data Anak</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="nama_anak" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-user text-indigo-600 mr-2"></i> Nama Anak
                                </label>
                                <input type="text" name="nama_anak" id="nama_anak"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Nama lengkap anak">
                            </div>
                            <div>
                                <label for="pekerjaan_anak" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-briefcase text-indigo-600 mr-2"></i> Pekerjaan Anak
                                </label>
                                <input type="text" name="pekerjaan_anak" id="pekerjaan_anak"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Contoh: Mahasiswa / Pelajar">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="tempat_lahir_anak" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i> Tempat Lahir Anak
                                </label>
                                <input type="text" name="tempat_lahir_anak" id="tempat_lahir_anak"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    placeholder="Contoh: Semarang">
                            </div>
                            <div>
                                <label for="tanggal_lahir_anak" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i> Tanggal Lahir Anak
                                </label>
                                <input type="date" name="tanggal_lahir_anak" id="tanggal_lahir_anak"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                        </div>

                        <!-- Jenis Kelamin Anak -->
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-venus-mars text-indigo-600 mr-2"></i> Jenis Kelamin Anak
                            </label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_kelamin_anak" value="Laki-laki"
                                        class="form-radio text-indigo-600">
                                    <span class="ml-2 text-gray-700">Laki-laki</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_kelamin_anak" value="Perempuan"
                                        class="form-radio text-indigo-600">
                                    <span class="ml-2 text-gray-700">Perempuan</span>
                                </label>
                            </div>
                        </div>

                        <!-- Alamat Anak -->
                        <div class="mt-4">
                            <label for="alamat_anak" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-home text-indigo-600 mr-2"></i> Alamat Anak
                            </label>
                            <textarea name="alamat_anak" id="alamat_anak" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                                placeholder="Alamat lengkap anak"></textarea>
                        </div>
                    </div>

                    <!-- Penghasilan -->
                    <div>
                        <label for="jumlah_penghasilan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-money-bill-wave text-indigo-600 mr-2"></i> Jumlah Penghasilan (Rp)
                        </label>
                        <input type="number" step="0.01" name="jumlah_penghasilan" id="jumlah_penghasilan"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Contoh: 3000000.00">
                    </div>

                    <!-- Kontak -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone text-indigo-600 mr-2"></i> No. Telepon
                            </label>
                            <input type="text" name="no_telp" id="no_telp"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-600 mr-2"></i> Email
                            </label>
                            <input type="email" name="email" id="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="contoh@email.com">
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ url()->previous() }}"
                            class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 border border-gray-300">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Simpan Persyaratan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
