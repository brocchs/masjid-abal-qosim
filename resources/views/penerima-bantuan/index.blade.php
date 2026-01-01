@extends('layouts.app')

@section('title', 'Data Penerima Bantuan')
@section('page-title', 'Data Penerima Bantuan')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 space-y-4 md:space-y-0">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Penerima Bantuan</h2>
            <p class="text-sm text-gray-600">Kelola data penerima zakat, donasi, dan wakaf</p>
        </div>
        <a href="{{ route('penerima-bantuan.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah Penerima
        </a>
    </div>

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
                        <a href="{{ route('penerima-bantuan.show', $item->id) }}" class="text-blue-600 hover:text-blue-900">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('penerima-bantuan.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('penerima-bantuan.destroy', $item->id) }}" class="inline" onsubmit="return showDeleteModal(this)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
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
</div>
@endsection