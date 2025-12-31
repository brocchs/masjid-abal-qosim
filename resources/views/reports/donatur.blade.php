@extends('layouts.app')

@section('title', 'Laporan Donatur - Masjid Abal Qosim')
@section('page-title', 'Laporan Donatur')

@section('content')
<div class="mb-6">
    <div class="bg-white rounded-lg shadow p-6">
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
                    <button type="submit" class="w-full bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Donatur</h6>
                <h4 class="text-xl font-bold">{{ $totalDonatur }}</h4>
            </div>
            <i class="fas fa-users text-2xl"></i>
        </div>
    </div>
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Donasi</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-hand-holding-heart text-2xl"></i>
        </div>
    </div>
    <div class="bg-purple-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Transaksi</h6>
                <h4 class="text-xl font-bold">{{ $totalTransactions }}</h4>
            </div>
            <i class="fas fa-exchange-alt text-2xl"></i>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Donatur
        </h5>
    </div>
    <div class="p-6">
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
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $item->nama_pemberi }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $item->type }}</td>
                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">Rp {{ number_format($item->total_amount, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $item->total_transactions }} kali</td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('reports.donatur.detail', $item->nama_pemberi) }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
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
    </div>
</div>
@endsection