@extends('layouts.app')

@section('title', 'Import Cash Flow - Masjid Abal Qosim')
@section('page-title', 'Import Cash Flow')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Form Import -->
    <div class="bg-white rounded-lg shadow">
        <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
            <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-file-upload mr-2"></i>
                Upload File Excel
            </h5>
        </div>
        <div class="p-6">
            <form action="{{ route('cash-flow.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">File Excel</label>
                    <input type="file" name="file" accept=".xlsx,.xls" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green">
                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex space-x-3">
                    <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                        <i class="fas fa-upload mr-2"></i>Import Data
                    </button>
                    <a href="{{ route('cash-flow.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </form>

            @if(session('success_count'))
            <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                <p class="font-bold">Berhasil import {{ session('success_count') }} data</p>
            </div>
            @endif

            @if(session('errors_detail'))
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded max-h-96 overflow-y-auto">
                <p class="font-bold mb-2">Error Detail:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach(session('errors_detail') as $error)
                    <li class="text-sm">
                        <strong>Baris {{ $error['row'] }}:</strong> {{ $error['message'] }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    <!-- Panduan -->
    <div class="bg-white rounded-lg shadow">
        <div class="bg-blue-50 px-6 py-4 border-b-2 border-blue-500 rounded-t-lg">
            <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-info-circle mr-2 text-blue-600"></i>
                Panduan Import
            </h5>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div>
                    <h6 class="font-semibold text-gray-800 mb-2">Format File:</h6>
                    <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                        <li>File harus berformat Excel (.xlsx atau .xls)</li>
                        <li>Maksimal ukuran file 2MB</li>
                    </ul>
                </div>

                <div>
                    <h6 class="font-semibold text-gray-800 mb-2">Struktur Kolom:</h6>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200">
                        <p class="text-xs mb-1">Baris 1 (Header):</p>
                        <code class="text-xs">tanggal | jenis | jumlah | deskripsi</code>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Header harus persis seperti di atas (huruf kecil)</p>
                </div>

                <div>
                    <h6 class="font-semibold text-gray-800 mb-2">Aturan Kolom:</h6>
                    <div class="space-y-2 text-sm">
                        <div class="border-l-4 border-blue-500 pl-3">
                            <strong>Tanggal:</strong>
                            <p class="text-gray-600">Format: dd/mm/yyyy</p>
                            <p class="text-xs text-gray-500">Contoh: 31/12/2024</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-3">
                            <strong>Jenis:</strong>
                            <p class="text-gray-600">Isi: "Pemasukan" atau "Pengeluaran"</p>
                            <p class="text-xs text-gray-500">Tidak case-sensitive</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-3">
                            <strong>Jumlah:</strong>
                            <p class="text-gray-600">Angka positif, boleh pakai titik pemisah ribuan</p>
                            <p class="text-xs text-gray-500">Contoh: 100000 atau 100.000</p>
                        </div>
                        <div class="border-l-4 border-purple-500 pl-3">
                            <strong>Deskripsi:</strong>
                            <p class="text-gray-600">Keterangan transaksi (tidak boleh kosong)</p>
                        </div>
                    </div>
                </div>

                <div>
                    <h6 class="font-semibold text-gray-800 mb-2">Contoh Data Excel:</h6>
                    <div class="bg-gray-50 p-3 rounded border border-gray-200">
                        <table class="text-xs w-full">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left p-1">tanggal</th>
                                    <th class="text-left p-1">jenis</th>
                                    <th class="text-left p-1">jumlah</th>
                                    <th class="text-left p-1">deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="p-1">01/01/2024</td><td class="p-1">Pemasukan</td><td class="p-1">500000</td><td class="p-1">Donasi Jamaah</td></tr>
                                <tr><td class="p-1">02/01/2024</td><td class="p-1">Pengeluaran</td><td class="p-1">200000</td><td class="p-1">Listrik Bulan Januari</td></tr>
                                <tr><td class="p-1">03/01/2024</td><td class="p-1">Pemasukan</td><td class="p-1">1000000</td><td class="p-1">Wakaf Tunai</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-yellow-50 border border-yellow-200 rounded p-3">
                    <p class="text-sm text-yellow-800">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Perhatian:</strong> Jika ada error, data yang valid tetap akan tersimpan. Perbaiki baris yang error dan import ulang.
                    </p>
                </div>

                <div>
                    <a href="{{ route('cash-flow.download-template') }}" 
                       class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm">
                        <i class="fas fa-download mr-2"></i>Download Template Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
