@extends('layouts.app')

@section('title', 'Detail Donatur - Masjid Abal Qosim')
@section('page-title', 'Detail Donatur: ' . $nama)

@section('content')
<div class="mb-6">
    <a href="{{ route('reports.donatur') }}?start_date={{ $startDate }}&end_date={{ $endDate }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Kembali
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Donasi</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-hand-holding-heart text-2xl"></i>
        </div>
    </div>
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Wakaf</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-mosque text-2xl"></i>
        </div>
    </div>
</div>

@if($donasi->count() > 0)
<div class="bg-white rounded-lg shadow mb-6">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-green-500 rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-hand-holding-heart mr-2"></i>
            Riwayat Donasi
        </h5>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($donasi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $item->tanggal_shodaqoh->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-sm text-green-600 font-semibold">Rp {{ number_format($item->jumlah_shodaqoh, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->keterangan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if($wakaf->count() > 0)
<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-blue-500 rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-mosque mr-2"></i>
            Riwayat Wakaf
        </h5>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($wakaf as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $item->tanggal_wakaf->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-sm text-blue-600 font-semibold">Rp {{ number_format($item->jumlah_wakaf, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $item->keterangan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection