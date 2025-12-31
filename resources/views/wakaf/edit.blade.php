@extends('layouts.app')

@section('title', 'Edit Wakaf - Masjid Abal Qosim')
@section('page-title', 'Edit Wakaf')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-4 md:px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <div class="flex justify-between items-center">
            <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit Wakaf
            </h5>
            <a href="{{ route('wakaf.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="p-4 md:p-6">
        <form method="POST" action="{{ route('wakaf.update', $wakaf->id) }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label for="nama_pemberi" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Pemberi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="nama_pemberi" 
                               name="nama_pemberi" 
                               value="{{ old('nama_pemberi', $wakaf->nama_pemberi) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-masjid-green focus:border-transparent @error('nama_pemberi') border-red-500 @enderror"
                               required>
                        @error('nama_pemberi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jenis_wakaf" class="block text-sm font-medium text-gray-700 mb-2">
                            Jenis Wakaf <span class="text-red-500">*</span>
                        </label>
                        <select id="jenis_wakaf" 
                                name="jenis_wakaf" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-masjid-green focus:border-transparent @error('jenis_wakaf') border-red-500 @enderror"
                                required>
                            <option value="">Pilih Jenis Wakaf</option>
                            <option value="Tanah" {{ old('jenis_wakaf', $wakaf->jenis_wakaf) == 'Tanah' ? 'selected' : '' }}>Tanah</option>
                            <option value="Bangunan" {{ old('jenis_wakaf', $wakaf->jenis_wakaf) == 'Bangunan' ? 'selected' : '' }}>Bangunan</option>
                            <option value="Uang" {{ old('jenis_wakaf', $wakaf->jenis_wakaf) == 'Uang' ? 'selected' : '' }}>Uang</option>
                            <option value="Peralatan" {{ old('jenis_wakaf', $wakaf->jenis_wakaf) == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                            <option value="Lainnya" {{ old('jenis_wakaf', $wakaf->jenis_wakaf) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('jenis_wakaf')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jumlah_wakaf" class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah Wakaf (Rp) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="jumlah_wakaf" 
                               name="jumlah_wakaf" 
                               value="{{ old('jumlah_wakaf', $wakaf->jumlah_wakaf) }}"
                               min="0"
                               step="1000"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-masjid-green focus:border-transparent @error('jumlah_wakaf') border-red-500 @enderror"
                               required>
                        @error('jumlah_wakaf')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label for="tanggal_wakaf" class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Wakaf <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="tanggal_wakaf" 
                               name="tanggal_wakaf" 
                               value="{{ old('tanggal_wakaf', $wakaf->tanggal_wakaf->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-masjid-green focus:border-transparent @error('tanggal_wakaf') border-red-500 @enderror"
                               required>
                        @error('tanggal_wakaf')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                            Keterangan
                        </label>
                        <textarea id="keterangan" 
                                  name="keterangan" 
                                  rows="4"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-masjid-green focus:border-transparent @error('keterangan') border-red-500 @enderror"
                                  placeholder="Keterangan tambahan (opsional)">{{ old('keterangan', $wakaf->keterangan) }}</textarea>
                        @error('keterangan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex flex-wrap gap-2">
                    <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-6 py-2 rounded">
                        <i class="fas fa-save mr-2"></i>
                        Update Wakaf
                    </button>
                    <a href="{{ route('wakaf.show', $wakaf->id) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection