@extends('layouts.app')

@section('title', 'Detail Donatur - ' . $nama)
@section('page-title', 'Detail Donatur: ' . $nama)

@section('content')
<!-- Header dengan tombol kembali -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
    <div class="flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-gradient-to-r from-masjid-green to-masjid-green-light rounded-lg flex items-center justify-center">
                <i class="fas fa-user text-white text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-800">{{ $nama }}</h2>
                <p class="text-sm text-gray-500">Detail Riwayat Donasi & Wakaf</p>
            </div>
        </div>
        <a href="{{ route('reports.donatur', ['start_date' => $startDate, 'end_date' => $endDate]) }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<!-- Ringkasan -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-gradient-to-r from-masjid-green to-masjid-green-light rounded-xl shadow-sm p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Total Donasi</p>
                <p class="text-3xl font-bold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                <p class="text-green-100 text-sm mt-1">{{ $donasi->count() }} transaksi</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-hand-holding-heart text-2xl"></i>
            </div>
        </div>
    </div>
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl shadow-sm p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Total Wakaf</p>
                <p class="text-3xl font-bold">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</p>
                <p class="text-blue-100 text-sm mt-1">{{ $wakaf->count() }} transaksi</p>
            </div>
            <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                <i class="fas fa-mosque text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Donasi -->
@if($donasi->count() > 0)
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="bg-gradient-to-r from-masjid-green to-masjid-green-light px-6 py-4">
        <h3 class="text-lg font-semibold text-white flex items-center">
            <i class="fas fa-hand-holding-heart mr-2"></i>Riwayat Donasi
        </h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-green-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($donasi as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->tanggal_shodaqoh->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-masjid-green">Rp {{ number_format($item->jumlah_shodaqoh, 0, ',', '.') }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->keterangan ?: '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<!-- Riwayat Wakaf -->
@if($wakaf->count() > 0)
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
        <h3 class="text-lg font-semibold text-white flex items-center">
            <i class="fas fa-mosque mr-2"></i>Riwayat Wakaf
        </h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-blue-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($wakaf as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->tanggal_wakaf->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{ $item->jenis_wakaf }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-bold text-blue-600">Rp {{ number_format($item->jumlah_wakaf, 0, ',', '.') }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $item->keterangan ?: '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@if($donasi->count() == 0 && $wakaf->count() == 0)
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12">
    <div class="text-center">
        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Tidak ada riwayat transaksi untuk periode ini</p>
    </div>
</div>
@endif
@endsection