@extends('layouts.app')

@section('title', 'Tambah Donasi - Masjid Abal Qosim')
@section('page-title', 'Tambah Donasi')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Donasi
                </h5>
            </div>
            <div class="p-6">
                <form action="{{ route('donasi.store') }}" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nama_pemberi" class="block text-sm font-medium text-gray-700 mb-2">Nama Pemberi</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama_pemberi') border-red-500 @enderror" 
                                   id="nama_pemberi" name="nama_pemberi" value="{{ old('nama_pemberi') }}" 
                                   placeholder="Masukkan nama pemberi donasi" required>
                            @error('nama_pemberi')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="tanggal_shodaqoh" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Donasi</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('tanggal_shodaqoh') border-red-500 @enderror" 
                                   id="tanggal_shodaqoh" name="tanggal_shodaqoh" 
                                   value="{{ old('tanggal_shodaqoh', date('Y-m-d')) }}" required>
                            @error('tanggal_shodaqoh')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4">
                        <div class="mb-4">
                            <label for="jumlah_shodaqoh" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Donasi (Rp)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah_shodaqoh') border-red-500 @enderror" 
                                   id="donasi_display" placeholder="0" 
                                   oninput="formatCurrency(this)">
                            <input type="hidden" id="jumlah_shodaqoh" name="jumlah_shodaqoh" value="{{ old('jumlah_shodaqoh') }}" required>
                            @error('jumlah_shodaqoh')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('keterangan') border-red-500 @enderror" 
                                  id="keterangan" name="keterangan" rows="3" 
                                  placeholder="Masukkan keterangan...">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('donasi.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Donasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function formatCurrency(input) {
    let value = input.value.replace(/[^\d]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = formatted;
    document.getElementById('jumlah_shodaqoh').value = value;
}
</script>
@endsection