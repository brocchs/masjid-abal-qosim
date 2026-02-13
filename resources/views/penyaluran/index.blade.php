@extends('layouts.app')

@section('title', 'Data Penyaluran')
@section('page-title', 'Data Penyaluran')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <x-admin.stat-card
        label="Total Penyaluran"
        :value="number_format($penyaluran->total(), 0, ',', '.')"
        icon="fa-hand-holding"
        tone="emerald"
    />
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
        <a href="{{ route('penyaluran.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center justify-center w-full">
            <i class="fas fa-plus mr-2"></i>
            Tambah Penyaluran
        </a>
    </div>
</div>

<x-admin.section-card title="Daftar Penyaluran Dana" icon="fa-list">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerima</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nominal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sumber Dana</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($penyaluran as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $item->tanggal_penyaluran->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ $item->penerima->nama }}</div>
                            <div class="text-sm text-gray-500">{{ $item->penerima->kategori_penerima }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Rp {{ number_format($item->nominal, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                            {{ class_basename($item->sumber_dana_type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                        <a href="{{ route('penyaluran.show', $item->id) }}" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded-md text-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('penyaluran.edit', $item->id) }}" class="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded-md text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('penyaluran.destroy', $item->id) }}" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
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
                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data penyaluran</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 pagination-wrapper">
        {{ $penyaluran->links() }}
    </div>
</x-admin.section-card>
@endsection
