@extends('layouts.app')

@section('title', 'Mustahik - Masjid Abal Qosim')
@section('page-title', 'Mustahik')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <x-admin.stat-card
        label="Total Mustahik"
        :value="number_format($mustahiks->total(), 0, ',', '.')"
        icon="fa-users"
        tone="blue"
    />
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
        <div class="text-center">
            <a href="{{ route('mustahik.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Mustahik
            </a>
        </div>
    </div>
</div>

<x-admin.section-card title="Daftar Mustahik" icon="fa-list">
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
                                    <a href="{{ route('mustahik.edit', $mustahik) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded-md text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mustahik.destroy', $mustahik) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md text-sm">
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
                <a href="{{ route('mustahik.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Pertama
                </a>
            </div>
        @endif
</x-admin.section-card>
@endsection
