@extends('layouts.app')

@section('title', 'Edit Zakat Maal - Masjid Abal Qosim')
@section('page-title', 'Edit Zakat Maal')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Zakat Maal
                </h5>
            </div>
            <div class="p-6">
                <form action="{{ route('zakat-maal.update', $zakatMaal) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nama_pembayar" class="block text-sm font-medium text-gray-700 mb-2">Nama Pembayar</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama_pembayar') border-red-500 @enderror" 
                                   id="nama_pembayar" name="nama_pembayar" value="{{ old('nama_pembayar', $zakatMaal->nama_pembayar) }}" 
                                   placeholder="Masukkan nama pembayar" required>
                            @error('nama_pembayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Bayar</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('tanggal_bayar') border-red-500 @enderror" 
                                   id="tanggal_bayar" name="tanggal_bayar" 
                                   value="{{ old('tanggal_bayar', $zakatMaal->tanggal_bayar->format('Y-m-d')) }}" required>
                            @error('tanggal_bayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="jumlah_harta" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Harta (Rp)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah_harta') border-red-500 @enderror" 
                                   id="harta_display" placeholder="0" 
                                   oninput="formatCurrency(this)" onchange="hitungZakat()">
                            <input type="hidden" id="jumlah_harta" name="jumlah_harta" value="{{ old('jumlah_harta', $zakatMaal->jumlah_harta) }}" required>
                            @error('jumlah_harta')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="zakat_dibayar" class="block text-sm font-medium text-gray-700 mb-2">Zakat Dibayar (2.5%)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('zakat_dibayar') border-red-500 @enderror" 
                                   id="zakat_display" placeholder="0" 
                                   oninput="formatCurrencyZakat(this)">
                            <input type="hidden" id="zakat_dibayar" name="zakat_dibayar" value="{{ old('zakat_dibayar', $zakatMaal->zakat_dibayar) }}" required>
                            @error('zakat_dibayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('keterangan') border-red-500 @enderror" 
                                  id="keterangan" name="keterangan" rows="3" 
                                  placeholder="Masukkan keterangan...">{{ old('keterangan', $zakatMaal->keterangan) }}</textarea>
                        @error('keterangan')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('zakat-maal.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
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
    document.getElementById('jumlah_harta').value = value;
    hitungZakat();
}

function formatCurrencyZakat(input) {
    let value = input.value.replace(/[^\d]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = formatted;
    document.getElementById('zakat_dibayar').value = value;
}

function hitungZakat() {
    let harta = document.getElementById('jumlah_harta').value || 0;
    let zakat = Math.round(harta * 0.025);
    document.getElementById('zakat_display').value = new Intl.NumberFormat('id-ID').format(zakat);
    document.getElementById('zakat_dibayar').value = zakat;
}

// Set initial values
window.onload = function() {
    let initialHarta = '{{ old('jumlah_harta', $zakatMaal->jumlah_harta) }}';
    let initialZakat = '{{ old('zakat_dibayar', $zakatMaal->zakat_dibayar) }}';
    document.getElementById('harta_display').value = new Intl.NumberFormat('id-ID').format(initialHarta);
    document.getElementById('zakat_display').value = new Intl.NumberFormat('id-ID').format(initialZakat);
}
</script>
@endsection