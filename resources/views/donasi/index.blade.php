@extends('layouts.app')

@section('title', 'Donasi - Masjid Abal Qosim')
@section('page-title', 'Donasi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Donasi</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($donasi->sum('jumlah_shodaqoh'), 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-hand-holding-usd text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('donasi.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Donasi
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-4 md:px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Donasi
        </h5>
    </div>
    <div class="p-4 md:p-6">
        @if($donasi->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pemberi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Diinput Oleh</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($donasi as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 text-sm text-gray-900">{{ ($donasi->currentPage() - 1) * $donasi->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $item->nama_pemberi }}</td>
                        <td class="px-4 py-4 text-sm font-bold text-masjid-green">Rp {{ number_format($item->jumlah_shodaqoh, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->tanggal_shodaqoh->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->keterangan ?: '-' }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->user ? $item->user->name : '-' }}</td>
                        <td class="px-4 py-4 text-sm space-x-2">
                            <a href="{{ route('donasi.show', $item->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-xs">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('donasi.edit', $item->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-xs">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('donasi.destroy', $item->id) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $donasi->links() }}
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-hand-holding-usd text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-500 mb-4">Belum ada data donasi</p>
            <a href="{{ route('donasi.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                <i class="fas fa-plus mr-2"></i>
                Tambah Donasi Pertama
            </a>
        </div>
        @endif
    </div>
</div>
@endsection