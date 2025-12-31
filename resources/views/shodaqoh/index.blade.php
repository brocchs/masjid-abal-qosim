@extends('layouts.app')

@section('title', 'Shodaqoh - Masjid Abal Qosim')
@section('page-title', 'Shodaqoh')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-red-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Shodaqoh</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalShodaqoh, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-heart text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('shodaqoh.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Shodaqoh
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Shodaqoh
        </h5>
    </div>
    <div class="p-6">
        @if($shodaqohs->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pemberi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Shodaqoh</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Diinput Oleh</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($shodaqohs as $shodaqoh)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $shodaqoh->tanggal_shodaqoh->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $shodaqoh->nama_pemberi }}</td>
                            <td class="px-4 py-3 text-sm text-green-600 font-bold">Rp {{ number_format($shodaqoh->jumlah_shodaqoh, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $shodaqoh->keterangan ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $shodaqoh->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('shodaqoh.edit', $shodaqoh) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('shodaqoh.destroy', $shodaqoh) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
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
                {{ $shodaqohs->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-heart text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada data shodaqoh</p>
                <a href="{{ route('shodaqoh.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection