@extends('layouts.app')

@section('title', 'Edit Penerima Bantuan')
@section('page-title', 'Edit Penerima Bantuan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Form Edit Penerima Bantuan</h2>
        <p class="text-sm text-gray-600">Update data penerima bantuan</p>
    </div>

    <form method="POST" action="{{ route('penerima-bantuan.update', $penerima->id) }}" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama', $penerima->nama) }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('nama')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $penerima->nik) }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('nik')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $penerima->telepon) }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('telepon')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Bantuan</label>
                <select name="jenis_bantuan" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                    <option value="">Pilih Jenis Bantuan</option>
                    <option value="donasi" {{ old('jenis_bantuan', $penerima->jenis_bantuan) == 'donasi' ? 'selected' : '' }}>Donasi</option>
                    <option value="wakaf" {{ old('jenis_bantuan', $penerima->jenis_bantuan) == 'wakaf' ? 'selected' : '' }}>Wakaf</option>
                </select>
                @error('jenis_bantuan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status Verifikasi</label>
                <select name="status_verifikasi" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                    <option value="pending" {{ old('status_verifikasi', $penerima->status_verifikasi) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="verified" {{ old('status_verifikasi', $penerima->status_verifikasi) == 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="rejected" {{ old('status_verifikasi', $penerima->status_verifikasi) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('status_verifikasi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Penerima</label>
                <input type="text" name="kategori_penerima" value="{{ old('kategori_penerima', $penerima->kategori_penerima) }}" 
                    placeholder="Contoh: Fakir, Miskin, Yatim, Dhuafa, dll"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('kategori_penerima')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>{{ old('alamat', $penerima->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="3" 
                    placeholder="Keterangan tambahan (opsional)"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent">{{ old('keterangan', $penerima->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('penerima-bantuan.index') }}" 
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" 
                class="bg-masjid-green hover:bg-masjid-green-dark text-white px-6 py-2 rounded-lg transition-colors">
                Update
            </button>
        </div>
    </form>
</div>
@endsection