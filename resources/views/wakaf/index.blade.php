@extends('layouts.app')

@section('title', 'Wakaf - Masjid Abal Qosim')
@section('page-title', 'Wakaf')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-green-600 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Wakaf</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($wakaf->sum('jumlah_wakaf'), 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-mosque text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('wakaf.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Wakaf
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-4 md:px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Wakaf
        </h5>
    </div>
    <div class="p-4 md:p-6">
        @if($wakaf->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pemberi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Diinput Oleh</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($wakaf as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 text-sm text-gray-900">{{ ($wakaf->currentPage() - 1) * $wakaf->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $item->nama_pemberi }}</td>
                        <td class="px-4 py-4 text-sm">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $item->jenis_wakaf }}</span>
                        </td>
                        <td class="px-4 py-4 text-sm font-bold text-green-600">Rp {{ number_format($item->jumlah_wakaf, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->tanggal_wakaf->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->keterangan ?: '-' }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->user ? $item->user->name : '-' }}</td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('wakaf.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('wakaf.destroy', $item) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
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
                {{ $wakaf->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-mosque text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-500 mb-4">Belum ada data wakaf</p>
            <a href="{{ route('wakaf.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                <i class="fas fa-plus mr-2"></i>
                Tambah Wakaf Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection