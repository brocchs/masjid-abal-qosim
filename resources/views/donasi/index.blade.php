@extends('layouts.app')

@section('title', 'Donasi - Masjid Abal Qosim')
@section('page-title', 'Donasi')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <x-admin.stat-card
        label="Total Donasi"
        :value="'Rp ' . number_format($donasi->sum('total_bayar'), 0, ',', '.')"
        icon="fa-hand-holding-usd"
        tone="blue"
    />
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
        <div class="text-center">
            <a href="{{ route('donasi.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Donasi
            </a>
        </div>
    </div>
</div>

<x-admin.section-card title="Daftar Donasi" icon="fa-list">
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
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($donasi as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 text-sm text-gray-900">{{ ($donasi->currentPage() - 1) * $donasi->perPage() + $index + 1 }}</td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $item->nama_pembayar }}</td>
                        <td class="px-4 py-4 text-sm font-bold text-masjid-green">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->tanggal_bayar->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-900">{{ $item->keterangan ?: '-' }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $item->user ? $item->user->name : '-' }}</td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('donasi.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded-md text-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('donasi.destroy', $item) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
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
                {{ $donasi->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @else
        <div class="text-center py-8">
            <i class="fas fa-hand-holding-usd text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-500 mb-4">Belum ada data donasi</p>
            <a href="{{ route('donasi.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg">
                <i class="fas fa-plus mr-2"></i>
                Tambah Donasi Pertama
            </a>
        </div>
        @endif
</x-admin.section-card>
@endsection
