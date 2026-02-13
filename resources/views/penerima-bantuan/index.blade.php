@extends('layouts.app')

@section('title', 'Data Penerima Bantuan')
@section('page-title', 'Data Penerima Bantuan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <x-admin.stat-card
        label="Total Penerima"
        :value="number_format($penerima->total(), 0, ',', '.')"
        icon="fa-users"
        tone="blue"
    />
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
        <a href="{{ route('penerima-bantuan.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center justify-center w-full">
            <i class="fas fa-plus mr-2"></i>
            Tambah Penerima
        </a>
    </div>
</div>

<x-admin.section-card title="Daftar Penerima Bantuan" icon="fa-list">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Bantuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($penerima as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                            <div class="text-sm text-gray-500">{{ $item->telepon }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->nik }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($item->jenis_bantuan == 'donasi') bg-blue-100 text-blue-800
                            @else bg-purple-100 text-purple-800 @endif">
                            {{ ucfirst($item->jenis_bantuan) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kategori_penerima }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                            @if($item->status_verifikasi == 'verified') bg-green-100 text-green-800
                            @elseif($item->status_verifikasi == 'pending') bg-yellow-100 text-yellow-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($item->status_verifikasi) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('penerima-bantuan.show', $item->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md text-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('penerima-bantuan.edit', $item->id) }}" class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded-md text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('penerima-bantuan.destroy', $item->id) }}" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded-md text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data penerima bantuan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 pagination-wrapper">
        {{ $penerima->links() }}
    </div>
</x-admin.section-card>
@endsection
