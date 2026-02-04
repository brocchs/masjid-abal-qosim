@extends('layouts.app')

@section('title', 'Tambah Inventaris - Masjid Abal Qosim')
@section('page-title', 'Tambah Inventaris')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('inventaris.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama_barang') border-red-500 @enderror" name="nama_barang" value="{{ old('nama_barang') }}" required>
                @error('nama_barang')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Barang <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('kode_barang') border-red-500 @enderror" name="kode_barang" value="{{ old('kode_barang') }}" required>
                @error('kode_barang')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('kategori') border-red-500 @enderror" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="elektronik" {{ old('kategori') == 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                    <option value="furniture" {{ old('kategori') == 'furniture' ? 'selected' : '' }}>Furniture</option>
                    <option value="alat_ibadah" {{ old('kategori') == 'alat_ibadah' ? 'selected' : '' }}>Alat Ibadah</option>
                    <option value="alat_kebersihan" {{ old('kategori') == 'alat_kebersihan' ? 'selected' : '' }}>Alat Kebersihan</option>
                    <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('kategori')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('kondisi') border-red-500 @enderror" name="kondisi" required>
                    <option value="">Pilih Kondisi</option>
                    <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak_ringan" {{ old('kondisi') == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="rusak_berat" {{ old('kondisi') == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('kondisi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah <span class="text-red-500">*</span></label>
                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah') border-red-500 @enderror" name="jumlah" value="{{ old('jumlah') }}" min="1" required>
                @error('jumlah')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Satuan <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('satuan') border-red-500 @enderror" name="satuan" value="{{ old('satuan') }}" placeholder="unit, pcs, buah, dll" required>
                @error('satuan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Perolehan <span class="text-red-500">*</span></label>
                <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('tanggal_perolehan') border-red-500 @enderror" name="tanggal_perolehan" value="{{ old('tanggal_perolehan') }}" required>
                @error('tanggal_perolehan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Harga Perolehan</label>
                <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('harga_perolehan') border-red-500 @enderror" name="harga_perolehan" value="{{ old('harga_perolehan') }}" min="0">
                @error('harga_perolehan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('lokasi') border-red-500 @enderror" name="lokasi" value="{{ old('lokasi') }}" required>
                @error('lokasi')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('keterangan') border-red-500 @enderror" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                @error('keterangan')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
        <div class="flex justify-end space-x-2 mt-6">
            <a href="{{ route('inventaris.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
            <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
        </div>
    </form>
</div>
@endsection
