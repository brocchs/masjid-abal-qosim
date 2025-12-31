@extends('layouts.app')

@section('title', 'Detail Wakaf - Masjid Abal Qosim')
@section('page-title', 'Detail Wakaf')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-4 md:px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <div class="flex justify-between items-center">
            <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                <i class="fas fa-mosque mr-2"></i>
                Detail Wakaf
            </h5>
            <a href="{{ route('wakaf.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="p-4 md:p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pemberi</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $wakaf->nama_pemberi }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Wakaf</label>
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                        {{ $wakaf->jenis_wakaf }}
                    </span>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Wakaf</label>
                    <p class="text-2xl font-bold text-green-600">Rp {{ number_format($wakaf->jumlah_wakaf, 0, ',', '.') }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Wakaf</label>
                    <p class="text-lg text-gray-900">{{ $wakaf->tanggal_wakaf->format('d F Y') }}</p>
                </div>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                    <div class="bg-gray-50 p-3 rounded border">
                        <p class="text-gray-900">{{ $wakaf->keterangan ?: 'Tidak ada keterangan' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Diinput Oleh</label>
                    <p class="text-lg text-gray-900">{{ $wakaf->user ? $wakaf->user->name : 'Tidak diketahui' }}</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Input</label>
                    <p class="text-sm text-gray-600">{{ $wakaf->created_at->format('d F Y H:i') }}</p>
                </div>
                
                @if($wakaf->updated_at != $wakaf->created_at)
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diupdate</label>
                    <p class="text-sm text-gray-600">{{ $wakaf->updated_at->format('d F Y H:i') }}</p>
                </div>
                @endif
            </div>
        </div>
        
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('wakaf.edit', $wakaf->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded text-sm">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Wakaf
                </a>
                <form method="POST" action="{{ route('wakaf.destroy', $wakaf->id) }}" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus data wakaf ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded text-sm">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus Wakaf
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection