@extends('layouts.app')

@section('title', 'Edit Zakat Fitrah - Masjid Abal Qosim')
@section('page-title', 'Edit Data Zakat Fitrah')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Zakat Fitrah
                </h5>
            </div>
            <div class="p-6">
                <form action="{{ route('zakat.update', $zakat) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nama_pembayar" class="block text-sm font-medium text-gray-700 mb-2">Nama Pembayar</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama_pembayar') border-red-500 @enderror" 
                                   id="nama_pembayar" name="nama_pembayar" value="{{ old('nama_pembayar', $zakat->nama_pembayar) }}" 
                                   placeholder="Masukkan nama pembayar" required>
                            @error('nama_pembayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Bayar</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('tanggal_bayar') border-red-500 @enderror" 
                                   id="tanggal_bayar" name="tanggal_bayar" 
                                   value="{{ old('tanggal_bayar', $zakat->tanggal_bayar->format('Y-m-d')) }}" required>
                            @error('tanggal_bayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="mb-4">
                            <label for="jumlah_jiwa" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Jiwa</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah_jiwa') border-red-500 @enderror" 
                                   id="jumlah_jiwa" name="jumlah_jiwa" value="{{ old('jumlah_jiwa', $zakat->jumlah_jiwa) }}" 
                                   placeholder="0" min="1" required onchange="hitungTotal()">
                            @error('jumlah_jiwa')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="harga_per_jiwa" class="block text-sm font-medium text-gray-700 mb-2">Harga per Jiwa (Rp)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('harga_per_jiwa') border-red-500 @enderror" 
                                   id="harga_display" placeholder="0" 
                                   oninput="formatCurrency(this)" onchange="hitungTotal()">
                            <input type="hidden" id="harga_per_jiwa" name="harga_per_jiwa" value="{{ old('harga_per_jiwa', $zakat->harga_per_jiwa) }}" required>
                            @error('harga_per_jiwa')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="total_display" class="block text-sm font-medium text-gray-700 mb-2">Total Bayar</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-50" id="total_display" readonly>
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('zakat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                            <i class="fas fa-save mr-2"></i>
                            Update Data
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
    document.getElementById('harga_per_jiwa').value = value;
    hitungTotal();
}

function hitungTotal() {
    let jiwa = document.getElementById('jumlah_jiwa').value || 0;
    let harga = document.getElementById('harga_per_jiwa').value || 0;
    let total = jiwa * harga;
    document.getElementById('total_display').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
}

// Set initial values
window.onload = function() {
    let initialHarga = '{{ old('harga_per_jiwa', $zakat->harga_per_jiwa) }}';
    document.getElementById('harga_display').value = new Intl.NumberFormat('id-ID').format(initialHarga);
    hitungTotal();
}
</script>
@endsection