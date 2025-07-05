@extends('landing.layouts.main')
@vite('resources/css/app.css')

@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-8 text-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-white flex items-center justify-center">
                    <i class="fas fa-file-alt mr-3"></i>
                    Ajukan Surat
                </h2>
                <p class="text-indigo-100 mt-2">Lengkapi form di bawah ini untuk mengajukan surat yang Anda butuhkan</p>
            </div>

            <!-- Form Body -->
            <div class="p-6 lg:p-8">
                <!-- Success Alert -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-2"></i>
                            {{ session('success') }}
                        </div>
                        <button type="button" class="text-green-600 hover:text-green-800 ml-4" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <!-- Error Alert -->
                @if (session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                            {{ session('error') }}
                        </div>
                        <button type="button" class="text-red-600 hover:text-red-800 ml-4" onclick="this.parentElement.style.display='none'">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <form method="POST" action="{{ route('surat.store') }}" class="space-y-6" id="suratForm" novalidate>
                    @csrf
                    
                    <!-- Jenis Surat -->
                    <div class="form-group">
                        <label for="jenis_surat" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-file-alt text-indigo-600 mr-2"></i>
                            Jenis Surat
                        </label>
                        <select name="jenis_surat" id="jenis_surat" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('jenis_surat') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                required>
                            <option value="" selected disabled>-- Pilih Jenis Surat --</option>
                            <option value="Surat Keterangan Domisili" {{ old('jenis_surat') == 'Surat Keterangan Domisili' ? 'selected' : '' }}>
                                Surat Keterangan Domisili
                            </option>
                            <option value="Surat Keterangan Usaha" {{ old('jenis_surat') == 'Surat Keterangan Usaha' ? 'selected' : '' }}>
                                Surat Keterangan Usaha
                            </option>
                            <option value="Surat Keterangan Tidak Mampu" {{ old('jenis_surat') == 'Surat Keterangan Tidak Mampu' ? 'selected' : '' }}>
                                Surat Keterangan Tidak Mampu
                            </option>
                            <option value="Surat Keterangan Kelahiran" {{ old('jenis_surat') == 'Surat Keterangan Kelahiran' ? 'selected' : '' }}>
                                Surat Keterangan Kelahiran
                            </option>
                            <option value="Surat Keterangan Kematian" {{ old('jenis_surat') == 'Surat Keterangan Kematian' ? 'selected' : '' }}>
                                Surat Keterangan Kematian
                            </option>
                            <option value="Surat Pengantar" {{ old('jenis_surat') == 'Surat Pengantar' ? 'selected' : '' }}>
                                Surat Pengantar
                            </option>
                        </select>
                        @error('jenis_surat')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tujuan -->
                    <div class="form-group">
                        <label for="tujuan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-bullseye text-indigo-600 mr-2"></i>
                            Tujuan
                        </label>
                        <input type="text" name="tujuan" id="tujuan" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 @error('tujuan') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                               placeholder="Contoh: Untuk keperluan administrasi perbankan" 
                               value="{{ old('tujuan') }}" 
                               required>
                        @error('tujuan')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group">
                        <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-comment-alt text-indigo-600 mr-2"></i>
                            Keterangan
                        </label>
                        <textarea name="keterangan" id="keterangan" rows="5" 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 resize-none @error('keterangan') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                  placeholder="Berikan detail tambahan mengenai pengajuan surat ini" 
                                  required>{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mt-2 text-sm text-gray-600 flex items-center">
                            <i class="fas fa-info-circle text-gray-400 mr-1"></i>
                            Berikan penjelasan secara detail untuk mempercepat proses persetujuan.
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row sm:justify-between gap-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('surat.index') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors duration-200 border border-gray-300 hover:border-gray-400">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 hover:shadow-xl focus:ring-4 focus:ring-indigo-200 focus:outline-none">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Ajukan Surat
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Card -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-900 mb-3 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                Informasi Penting
            </h3>
            <ul class="space-y-2 text-sm text-blue-800">
                <li class="flex items-start">
                    <i class="fas fa-check text-blue-600 mr-2 mt-1"></i>
                    <span>Pastikan semua data yang diisi sudah benar dan sesuai dengan dokumen resmi</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-blue-600 mr-2 mt-1"></i>
                    <span>Proses verifikasi akan dilakukan dalam 1-3 hari kerja</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-blue-600 mr-2 mt-1"></i>
                    <span>Anda akan mendapat notifikasi melalui sistem ketika surat telah diproses</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check text-blue-600 mr-2 mt-1"></i>
                    <span>Surat yang telah disetujui dapat diunduh langsung dari halaman pengajuan</span>
                </li>
            </ul>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const form = document.getElementById('suratForm');
        const inputs = form.querySelectorAll('input, select, textarea');
        
        // Add validation on form submit
        form.addEventListener('submit', function(event) {
            let isValid = true;
            
            inputs.forEach(input => {
                if (input.hasAttribute('required') && !input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
                    input.classList.remove('border-gray-300', 'focus:ring-indigo-500', 'focus:border-indigo-500');
                } else {
                    input.classList.remove('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
                    input.classList.add('border-gray-300', 'focus:ring-indigo-500', 'focus:border-indigo-500');
                }
            });
            
            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                
                // Show error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                    <span>Mohon lengkapi semua field yang diperlukan</span>
                `;
                
                // Remove existing error message if any
                const existingError = form.querySelector('.bg-red-50');
                if (existingError && !existingError.textContent.includes('{{ session("error") }}')) {
                    existingError.remove();
                }
                
                form.insertBefore(errorDiv, form.firstChild);
                
                // Scroll to top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
        
        // Real-time validation
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
                    this.classList.remove('border-gray-300', 'focus:ring-indigo-500', 'focus:border-indigo-500');
                } else {
                    this.classList.remove('border-red-300', 'focus:ring-red-500', 'focus:border-red-500');
                    this.classList.add('border-gray-300', 'focus:ring-indigo-500', 'focus:border-indigo-500');
                }
            });
        });
        
        // Enhanced select styling
        const selectElement = document.getElementById('jenis_surat');
        selectElement.addEventListener('change', function() {
            if (this.value) {
                this.classList.add('text-gray-900');
                this.classList.remove('text-gray-500');
            } else {
                this.classList.add('text-gray-500');
                this.classList.remove('text-gray-900');
            }
        });
    });
</script>
@endsection