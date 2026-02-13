@extends('layouts.app')

@section('title', 'Laporan Donatur - Masjid Abal Qosim')
@section('page-title', 'Laporan Donatur')

@section('content')
<div class="mb-6">
    <x-admin.section-card>
        <form method="GET" action="{{ route('reports.donatur') }}">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" id="start_date" name="start_date" value="{{ $startDate }}">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" id="end_date" name="end_date" value="{{ $endDate }}">
                </div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Jenis</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" id="type" name="type">
                        <option value="all" {{ $type == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="donasi" {{ $type == 'donasi' ? 'selected' : '' }}>Donasi</option>
                        <option value="wakaf" {{ $type == 'wakaf' ? 'selected' : '' }}>Wakaf</option>
                    </select>
                </div>
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari Nama</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" id="search" name="search" value="{{ $search }}" placeholder="Nama donatur...">
                </div>
                <div>
                    <button type="submit" class="w-full bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </x-admin.section-card>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <x-admin.stat-card
        label="Total Donatur"
        :value="number_format($totalDonatur, 0, ',', '.')"
        icon="fa-users"
        tone="blue"
    />
    <x-admin.stat-card
        label="Total Donasi"
        :value="'Rp ' . number_format($totalAmount, 0, ',', '.')"
        icon="fa-hand-holding-heart"
        tone="emerald"
    />
    <x-admin.stat-card
        label="Total Transaksi"
        :value="number_format($totalTransactions, 0, ',', '.') . ' Transaksi'"
        icon="fa-exchange-alt"
        tone="purple"
    />
</div>

<x-admin.section-card title="Daftar Donatur" icon="fa-list">
        @if($donatur->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Donatur</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jenis</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total Donasi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total Transaksi</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($donatur as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                            <span class="text-white text-sm font-bold">{{ strtoupper(substr($item->nama_pemberi, 0, 1)) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-semibold text-gray-900">{{ $item->nama_pemberi }}</p>
                                        <p class="text-xs text-gray-500">Donatur</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                    $types = explode(', ', $item->type);
                                @endphp
                                <div class="flex flex-wrap gap-1">
                                    @foreach($types as $type)
                                        @if($type == 'Donasi')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-hand-holding-usd mr-1"></i>
                                                {{ $type }}
                                            </span>
                                        @elseif($type == 'Wakaf')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                <i class="fas fa-mosque mr-1"></i>
                                                {{ $type }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-coins text-green-600 text-sm"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-semibold text-green-600">Rp {{ number_format($item->total_amount, 0, ',', '.') }}</p>
                                        <p class="text-xs text-gray-500">Total kontribusi</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <i class="fas fa-chart-line mr-1"></i>
                                    {{ $item->total_transactions }} transaksi
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('reports.donatur.detail', $item->nama_pemberi) }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                    <i class="fas fa-eye mr-1"></i>Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada data donatur</p>
            </div>
        @endif
</x-admin.section-card>
@endsection
