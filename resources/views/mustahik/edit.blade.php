@extends('layouts.app')

@section('title', 'Edit Mustahik - Masjid Abal Qosim')
@section('page-title', 'Edit Mustahik')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('mustahik.update', $mustahik) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama') border-red-500 @enderror" id="nama" name="nama" value="{{ old('nama', $mustahik->nama) }}" required>
                @error('nama')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-2">No HP</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('no_hp') border-red-500 @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $mustahik->no_hp) }}">
                @error('no_hp')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat <span class="text-red-500">*</span></label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('alamat') border-red-500 @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $mustahik->alamat) }}</textarea>
                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('kategori') border-red-500 @enderror" id="kategori" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="fakir" {{ old('kategori', $mustahik->kategori) == 'fakir' ? 'selected' : '' }}>Fakir</option>
                    <option value="miskin" {{ old('kategori', $mustahik->kategori) == 'miskin' ? 'selected' : '' }}>Miskin</option>
                    <option value="amil" {{ old('kategori', $mustahik->kategori) == 'amil' ? 'selected' : '' }}>Amil</option>
                    <option value="mualaf" {{ old('kategori', $mustahik->kategori) == 'mualaf' ? 'selected' : '' }}>Mualaf</option>
                    <option value="riqab" {{ old('kategori', $mustahik->kategori) == 'riqab' ? 'selected' : '' }}>Riqab</option>
                    <option value="gharim" {{ old('kategori', $mustahik->kategori) == 'gharim' ? 'selected' : '' }}>Gharim</option>
                    <option value="fisabilillah" {{ old('kategori', $mustahik->kategori) == 'fisabilillah' ? 'selected' : '' }}>Fisabilillah</option>
                    <option value="ibnu_sabil" {{ old('kategori', $mustahik->kategori) == 'ibnu_sabil' ? 'selected' : '' }}>Ibnu Sabil</option>
                </select>
                @error('kategori')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('keterangan') border-red-500 @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $mustahik->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex justify-end space-x-2 mt-6">
            <a href="{{ route('mustahik.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
            <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                <i class="fas fa-save mr-2"></i>Update
            </button>
        </div>
    </form>
</div>
@endsection
