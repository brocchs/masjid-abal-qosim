@extends('layouts.app')

@section('title', 'Laporan Donatur')
@section('page-title', 'Laporan Donatur')

@section('content')
<!-- Filter Form -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Cari Nama</label>
            <input type="text" name="search" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" value="{{ $search }}" placeholder="Nama donatur...">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
            <input type="date" name="start_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" value="{{ $startDate }}">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Akhir</label>
            <input type="date" name="end_date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" value="{{ $endDate }}">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis</label>
            <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent">
                <option value="all" {{ $type == 'all' ? 'selected' : '' }}>Semua</option>
                <option value="donasi" {{ $type == 'donasi' ? 'selected' : '' }}>Donasi</option>
                <option value="wakaf" {{ $type == 'wakaf' ? 'selected' : '' }}>Wakaf</option>
            </select>
        </div>
        <div class="flex items-end space-x-2">
            <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-search mr-2"></i>Cari
            </button>
            <a href="{{ route('reports.donatur') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-refresh mr-2"></i>Reset
            </a>
        </div>
    </form>
</div>

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-sm p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Total Donatur</p>
                <p class="text-3xl font-bold">{{ number_format($totalDonatur) }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-users text-2xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-masjid-green to-masjid-green-light rounded-xl shadow-sm p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Total Donasi & Wakaf</p>
                <p class="text-3xl font-bold">Rp {{ number_format($totalAmount, 0, ',', '.') }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-money-bill-wave text-2xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl shadow-sm p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm">Total Transaksi</p>
                <p class="text-3xl font-bold">{{ number_format($totalTransactions) }}</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-exchange-alt text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Donatur -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Donatur</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Donasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Transaksi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($donatur as $index => $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">{{ $item->nama_pemberi }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">{{ $item->type }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-masjid-green">Rp {{ number_format($item->total_amount, 0, ',', '.') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $item->total_transactions }}x</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('reports.donatur.detail', ['nama' => $item->nama_pemberi, 'start_date' => $startDate, 'end_date' => $endDate]) }}" 
                           class="bg-masjid-green hover:bg-masjid-green-dark text-white px-3 py-1 rounded-lg text-xs transition-colors">
                            <i class="fas fa-eye mr-1"></i>Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500">Tidak ada data donatur</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection