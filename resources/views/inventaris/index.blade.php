@extends('layouts.app')

@section('title', 'Inventaris - Masjid Abal Qosim')
@section('page-title', 'Inventaris')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Barang</h6>
                <h4 class="text-xl font-bold">{{ number_format($totalBarang, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-boxes text-2xl"></i>
        </div>
    </div>
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Nilai</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalNilai, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-money-bill-wave text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('inventaris.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Inventaris
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Inventaris
        </h5>
    </div>
    <div class="p-6">
        <div class="mb-4">
            <form action="{{ route('inventaris.index') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama, kode, kategori, atau lokasi..." class="flex-1 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-masjid-green">
                <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-6 py-2 rounded">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
                @if(request('search'))
                <a href="{{ route('inventaris.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    <i class="fas fa-times"></i>
                </a>
                @endif
            </form>
        </div>
        @if($inventaris->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kode</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Barang</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kategori</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kondisi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Lokasi</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($inventaris as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-semibold">{{ $item->kode_barang }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->nama_barang }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ ucfirst(str_replace('_', ' ', $item->kategori)) }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->jumlah }} {{ $item->satuan }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if($item->kondisi == 'baik')
                                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Baik</span>
                                @elseif($item->kondisi == 'rusak_ringan')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Rusak Ringan</span>
                                @else
                                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Rusak Berat</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->lokasi }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('inventaris.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('inventaris.destroy', $item) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-6">
                <div class="pagination-wrapper">
                    {{ $inventaris->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-box text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada data inventaris</p>
                <a href="{{ route('inventaris.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
