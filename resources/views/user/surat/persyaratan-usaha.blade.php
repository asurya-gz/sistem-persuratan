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
              

                <!-- Error Message -->
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif

               <form method="POST" action="{{ route('usaha.store') }}" class="space-y-6" id="usahaForm">
                    @csrf
<input type="hidden" name="surats_id" value="{{ $surat->id }}">

                    <!-- NIK -->
                    <div class="form-group">
                        <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-id-card text-indigo-600 mr-2"></i>
                            NIK <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nik" id="nik" value="{{ old('nik') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('nik') border-red-500 @enderror"
                               placeholder="Masukkan NIK Anda" required>
                        @error('nik')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tempat & Tanggal Lahir -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2"></i>
                                Tempat Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('tempat_lahir') border-red-500 @enderror"
                                   placeholder="Contoh: Semarang" required>
                            @error('tempat_lahir')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-calendar-alt text-indigo-600 mr-2"></i>
                                Tanggal Lahir <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('tanggal_lahir') border-red-500 @enderror" required>
                            @error('tanggal_lahir')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-venus-mars text-indigo-600 mr-2"></i>
                            Jenis Kelamin <span class="text-red-500">*</span>
                        </label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                       class="form-radio text-indigo-600" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                                <span class="ml-2 text-gray-700">Laki-laki</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                       class="form-radio text-indigo-600" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required>
                                <span class="ml-2 text-gray-700">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Agama -->
                    <div class="form-group">
                        <label for="agama" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-praying-hands text-indigo-600 mr-2"></i>
                            Agama <span class="text-red-500">*</span>
                        </label>
                        <select name="agama" id="agama"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('agama') border-red-500 @enderror" required>
                            <option value="" disabled {{ old('agama') ? '' : 'selected' }}>-- Pilih Agama --</option>
                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Budha" {{ old('agama') == 'Budha' ? 'selected' : '' }}>Budha</option>
                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                        </select>
                        @error('agama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Warga Negara -->
                    <div class="form-group">
                        <label for="warga_negara" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-flag text-indigo-600 mr-2"></i>
                            Warga Negara <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="warga_negara" id="warga_negara" value="{{ old('warga_negara') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('warga_negara') border-red-500 @enderror"
                               placeholder="Contoh: Indonesia" required>
                        @error('warga_negara')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pekerjaan -->
                    <div class="form-group">
                        <label for="pekerjaan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-briefcase text-indigo-600 mr-2"></i>
                            Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('pekerjaan') border-red-500 @enderror"
                               placeholder="Contoh: Mahasiswa / Karyawan" required>
                        @error('pekerjaan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-home text-indigo-600 mr-2"></i>
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat" id="alamat" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none @error('alamat') border-red-500 @enderror"
                                  placeholder="Alamat lengkap sesuai KTP" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Perkawinan -->
                    <div class="form-group">
                        <label for="status_perkawinan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-ring text-indigo-600 mr-2"></i>
                            Status Perkawinan <span class="text-red-500">*</span>
                        </label>
                        <select name="status_perkawinan" id="status_perkawinan"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('status_perkawinan') border-red-500 @enderror" required>
                            <option value="" disabled {{ old('status_perkawinan') ? '' : 'selected' }}>-- Pilih Status --</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai Hidup" {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>
                        @error('status_perkawinan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Usaha -->
                    <div class="form-group">
                        <label for="nama_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-store text-indigo-600 mr-2"></i>
                            Nama Usaha <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama_usaha" id="nama_usaha" value="{{ old('nama_usaha') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('nama_usaha') border-red-500 @enderror"
                               placeholder="Contoh: Warung Sembako Makmur" required>
                        @error('nama_usaha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Usaha -->
                    <div class="form-group">
                        <label for="jenis_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-industry text-indigo-600 mr-2"></i>
                            Jenis Usaha <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="jenis_usaha" id="jenis_usaha" value="{{ old('jenis_usaha') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('jenis_usaha') border-red-500 @enderror"
                               placeholder="Contoh: Dagang / Jasa / Produksi" required>
                        @error('jenis_usaha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Omset -->
                    <div class="form-group">
                        <label for="omset" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-money-bill-wave text-indigo-600 mr-2"></i>
                            Omset Perbulan (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="omset" id="omset" value="{{ old('omset') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('omset') border-red-500 @enderror"
                               placeholder="Contoh: 10000000" min="0" required>
                        @error('omset')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Penanggung Jawab -->
                    <div class="form-group">
                        <label for="penanggung_jawab" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-user-check text-indigo-600 mr-2"></i>
                            Penanggung Jawab <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="penanggung_jawab" id="penanggung_jawab" value="{{ old('penanggung_jawab') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('penanggung_jawab') border-red-500 @enderror"
                               placeholder="Nama penanggung jawab usaha" required>
                        @error('penanggung_jawab')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alamat Usaha -->
                    <div class="form-group">
                        <label for="alamat_usaha" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-map text-indigo-600 mr-2"></i>
                            Alamat Usaha <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat_usaha" id="alamat_usaha" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none @error('alamat_usaha') border-red-500 @enderror"
                                  placeholder="Alamat lengkap lokasi usaha" required>{{ old('alamat_usaha') }}</textarea>
                        @error('alamat_usaha')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- No Telp & Email -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-phone text-indigo-600 mr-2"></i>
                                No. Telepon
                            </label>
                            <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('no_telp') border-red-500 @enderror"
                                   placeholder="08xxxxxxxxxx">
                            @error('no_telp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-envelope text-indigo-600 mr-2"></i>
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                                   placeholder="contoh@email.com" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
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

<script>
// Debug form submission
document.getElementById('usahaForm').addEventListener('submit', function(e) {
    console.log('Form submitted');
    console.log('Form data:', new FormData(this));
});
</script>
@endsection