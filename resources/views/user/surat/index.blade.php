@extends('landing.layouts.main')
@vite('resources/css/app.css')

@php
    $jenisSuratMap = [
        'skck'               => 'Surat Keterangan Catatan Kepolisian',
        'sktm'               => 'Surat Keterangan Tidak Mampu',
        'domisili'           => 'Surat Keterangan Domisili',
        'kehilangan'         => 'Surat Keterangan Kehilangan',
        'kematian'           => 'Surat Keterangan Kematian',
        'kepemilikan_rumah'  => 'Surat Keterangan Kepemilikan Rumah',
        'mau_menikah'        => 'Surat Keterangan Mau Menikah',
        'penghasilan_ortu'   => 'Surat Keterangan Penghasilan Orang Tua',
        'sudah_menikah'      => 'Surat Keterangan Sudah Menikah',
        'usaha'              => 'Surat Keterangan Usaha',
    ];
@endphp


@section('content')
<section class="min-h-screen bg-gray-50 py-8 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    <i class="fas fa-file-alt text-indigo-600 mr-3"></i>
                    Daftar Pengajuan Surat
                </h2>
                <a href="{{ route('surat.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Ajukan Surat Baru
                </a>
            </div>
        </div>
        
        <!-- Main Content Card -->
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-4 border-b border-gray-200">
                <h5 class="text-lg font-semibold text-gray-900 flex items-center">
                    <i class="fas fa-file-alt text-indigo-600 mr-3"></i>
                    Surat yang Anda Ajukan
                </h5>
            </div>
            
            <!-- Card Body -->
            <div class="p-6">
                <!-- Success Alert -->
                @if(session('success'))
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
                
                @if(isset($surats) && $surats->count() > 0)
                    <!-- Desktop Table -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($surats as $index => $surat)
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $jenisSuratMap[$surat->jenis_surat] ?? $surat->jenis_surat }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $surat->tujuan }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $surat->created_at->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($surat->status == 'diajukan')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                    <i class="fas fa-clock mr-1"></i>
                                                    Menunggu
                                                </span>
                                            @elseif($surat->status == 'disetujui')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                                    <i class="fas fa-check-circle mr-1"></i>
                                                    Disetujui
                                                </span>
                                            @elseif($surat->status == 'ditolak')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                                    <i class="fas fa-times-circle mr-1"></i>
                                                    Ditolak
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate" title="{{ $surat->keterangan }}">
                                            {{ $surat->keterangan }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($surat->status == 'disetujui')
                                                <a href="{{ route('surat.download', $surat->id) }}" 
                                                   class="inline-flex items-center px-3 py-2 bg-green-600 text-white text-xs font-medium rounded-md hover:bg-green-700 transition-colors duration-200 shadow-sm hover:shadow-md"
                                                   title="Download Bukti Keterangan">
                                                    <i class="fas fa-download mr-1"></i>
                                                    Download
                                                </a>
                                            @else
                                                <span class="text-gray-400">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Mobile Cards -->
                    <div class="md:hidden space-y-4">
                        @foreach($surats as $index => $surat)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-indigo-300 transition-colors duration-200">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $surat->jenis_surat }}</h3>
                                    @if($surat->status == 'diajukan')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                            <i class="fas fa-clock mr-1"></i>
                                            Menunggu
                                        </span>
                                    @elseif($surat->status == 'disetujui')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            Disetujui
                                        </span>
                                    @elseif($surat->status == 'ditolak')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                            <i class="fas fa-times-circle mr-1"></i>
                                            Ditolak
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-bullseye w-4 mr-2"></i>
                                        <span class="font-medium">Tujuan:</span>
                                        <span class="ml-2">{{ $surat->tujuan }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar w-4 mr-2"></i>
                                        <span class="font-medium">Tanggal:</span>
                                        <span class="ml-2">{{ $surat->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-start text-gray-600">
                                        <i class="fas fa-comment w-4 mr-2 mt-0.5"></i>
                                        <span class="font-medium">Keterangan:</span>
                                        <span class="ml-2">{{ $surat->keterangan }}</span>
                                    </div>
                                </div>
                                
                                @if($surat->status == 'disetujui')
                                    <div class="mt-4 pt-3 border-t border-gray-200">
                                        <a href="{{ route('surat.download', $surat->id) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors duration-200 shadow-sm hover:shadow-md w-full justify-center">
                                            <i class="fas fa-download mr-2"></i>
                                            Download Bukti Keterangan
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-8 flex justify-center">
                        {{ $surats->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-12">
                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-file-alt text-4xl text-gray-400"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Pengajuan Surat</h4>
                        <p class="text-gray-600 mb-8 max-w-md mx-auto">
                            Anda belum mengajukan surat apapun. Silahkan klik tombol "Ajukan Surat Baru" untuk membuat pengajuan.
                        </p>
                        <a href="{{ route('surat.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Ajukan Surat Baru
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection