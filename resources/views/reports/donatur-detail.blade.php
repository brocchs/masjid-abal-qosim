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
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-1/4">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-1/3">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-5/12">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($donasi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                </div>
                                <div class="ml-3">
                                    <span class="text-gray-900 font-medium">{{ $item->tanggal_shodaqoh->format('d M Y') }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-hand-holding-usd text-green-600 text-xs"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-green-600">Rp {{ number_format($item->jumlah_shodaqoh, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->keterangan ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800' }}">
                                <i class="fas {{ $item->keterangan ? 'fa-info-circle' : 'fa-minus-circle' }} mr-1"></i>
                                {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                            </span>
                        </td>
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
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-1/4">Tanggal</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-1/3">Jumlah</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 w-5/12">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($wakaf as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                </div>
                                <div class="ml-3">
                                    <span class="text-gray-900 font-medium">{{ $item->tanggal_wakaf->format('d M Y') }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-mosque text-blue-600 text-xs"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-blue-600">Rp {{ number_format($item->jumlah_wakaf, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->keterangan ? 'bg-gray-100 text-gray-800' : 'bg-yellow-100 text-yellow-800' }}">
                                <i class="fas {{ $item->keterangan ? 'fa-info-circle' : 'fa-minus-circle' }} mr-1"></i>
                                {{ $item->keterangan ?? 'Tidak ada keterangan' }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection