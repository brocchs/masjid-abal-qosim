@extends('layouts.app')

@section('title', 'Detail Penerima Bantuan')
@section('page-title', 'Detail Penerima Bantuan')

@section('content')
<div class="space-y-6">
    <!-- Data Penerima -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Informasi Penerima</h2>
                <p class="text-sm text-gray-600">Detail lengkap penerima bantuan</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('penerima-bantuan.edit', $penerima->id) }}" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('penerima-bantuan.index') }}" 
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                <p class="text-lg font-semibold text-gray-900">{{ $penerima->nama }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">NIK</label>
                <p class="text-lg text-gray-900">{{ $penerima->nik }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">No. Telepon</label>
                <p class="text-lg text-gray-900">{{ $penerima->telepon }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Bantuan</label>
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                    @if($penerima->jenis_bantuan == 'donasi') bg-blue-100 text-blue-800
                    @else bg-purple-100 text-purple-800 @endif">
                    {{ ucfirst($penerima->jenis_bantuan) }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Kategori Penerima</label>
                <p class="text-lg text-gray-900">{{ $penerima->kategori_penerima }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Status Verifikasi</label>
                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                    @if($penerima->status_verifikasi == 'verified') bg-green-100 text-green-800
                    @elseif($penerima->status_verifikasi == 'pending') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ ucfirst($penerima->status_verifikasi) }}
                </span>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                <p class="text-lg text-gray-900">{{ $penerima->alamat }}</p>
            </div>
            @if($penerima->keterangan)
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500 mb-1">Keterangan</label>
                <p class="text-lg text-gray-900">{{ $penerima->keterangan }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Riwayat Penyaluran -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Riwayat Penyaluran</h3>
                <p class="text-sm text-gray-600">Total diterima: Rp {{ number_format($penerima->total_diterima, 0, ',', '.') }}</p>
            </div>
        </div>

        @if($penerima->penyaluran->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nominal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sumber Dana</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($penerima->penyaluran as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $item->tanggal_penyaluran->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            Rp {{ number_format($item->nominal, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ class_basename($item->sumber_dana_type) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $item->keterangan ?? '-' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-inbox text-gray-400 text-4xl mb-4"></i>
            <p class="text-gray-500">Belum ada riwayat penyaluran</p>
        </div>
        @endif
    </div>
</div>
@endsection