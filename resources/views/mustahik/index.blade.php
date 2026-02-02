@extends('layouts.app')

@section('title', 'Mustahik - Masjid Abal Qosim')
@section('page-title', 'Mustahik')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Mustahik</h6>
                <h4 class="text-xl font-bold">{{ $mustahiks->total() }}</h4>
            </div>
            <i class="fas fa-users text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('mustahik.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Mustahik
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Mustahik
        </h5>
    </div>
    <div class="p-6">
        @if($mustahiks->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Alamat</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">No HP</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kategori</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Diinput Oleh</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($mustahiks as $mustahik)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-semibold">{{ $mustahik->nama }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mustahik->alamat }}</td>
                            <td class="px-4 py-3 text-sm">{{ $mustahik->no_hp ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">{{ ucfirst(str_replace('_', ' ', $mustahik->kategori)) }}</span>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $mustahik->keterangan ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $mustahik->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('mustahik.edit', $mustahik) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mustahik.destroy', $mustahik) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
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
                    {{ $mustahiks->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-users text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada data mustahik</p>
                <a href="{{ route('mustahik.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
