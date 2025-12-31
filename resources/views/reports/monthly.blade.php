@extends('layouts.app')

@section('title', 'Laporan Keuangan - Masjid Abal Qosim')
@section('page-title', 'Keuangan Masjid')

@section('content')
<div class="print-only print-header">
    <h2>MASJID ABAL QOSIM</h2>
    <h4>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</h4>
    <p>Tanggal Cetak: {{ date('d F Y') }}</p>
</div>

<div class="print-only print-summary">
    <div><strong>Total Pemasukan:</strong> Rp {{ number_format($totalCredit, 0, ',', '.') }}</div>
    <div><strong>Total Pengeluaran:</strong> Rp {{ number_format($totalDebit, 0, ',', '.') }}</div>
    <div><strong>Saldo:</strong> Rp {{ number_format(abs($balance), 0, ',', '.') }} ({{ $balance >= 0 ? 'Surplus' : 'Defisit' }})</div>
</div>

<div class="no-print">
<div class="mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('reports.monthly') }}">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div class="md:col-span-2">
                    <label for="month" class="block text-sm font-medium text-gray-700 mb-2">Pilih Bulan</label>
                    <input type="month" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" id="month" name="month" value="{{ $month }}">
                </div>
                <div>
                    <button type="submit" class="w-full bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                        <i class="fas fa-search mr-2"></i>Tampilkan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Pemasukan</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalCredit, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-arrow-up text-2xl"></i>
        </div>
    </div>
    <div class="bg-red-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Pengeluaran</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalDebit, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-arrow-down text-2xl"></i>
        </div>
    </div>
    <div class="bg-{{ $balance >= 0 ? 'blue' : 'yellow' }}-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Saldo</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format(abs($balance), 0, ',', '.') }}</h4>
                <small class="text-xs">{{ $balance >= 0 ? 'Surplus' : 'Defisit' }}</small>
            </div>
            <i class="fas fa-wallet text-2xl"></i>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow p-4">
        <div class="text-center">
            <button onclick="window.print()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded w-full">
                <i class="fas fa-print mr-2"></i>
                Cetak Laporan
            </button>
        </div>
    </div>
</div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg no-print">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Detail Transaksi - {{ \Carbon\Carbon::parse($month)->format('F Y') }}
        </h5>
    </div>
    <div class="p-6">
        @if($transactions->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jenis</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Deskripsi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Diinput Oleh</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 no-print">Invoice</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $transaction->transaction_date->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded no-print {{ $transaction->type == 'credit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $transaction->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                                <span class="hidden print-inline">
                                    {{ $transaction->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $transaction->description }}</td>
                            <td class="px-4 py-3 text-sm {{ $transaction->type == 'credit' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->type == 'credit' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $transaction->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 no-print">
                                @if($transaction->invoice_file)
                                    <a href="{{ Storage::url($transaction->invoice_file) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex justify-center mt-6">
                {{ $transactions->appends(['month' => $month])->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada transaksi pada bulan ini</p>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<style>
@media print {
    * { -webkit-print-color-adjust: exact !important; color-adjust: exact !important; }
    
    .no-print, nav, .sidebar, aside, header, footer, button, .btn, .bg-gray-200, .md\:hidden { display: none !important; }
    .print-only { display: block !important; }
    .print-inline { display: inline !important; }
    
    body { font-size: 12px; margin: 0; padding: 20px; background: white !important; }
    main { margin: 0 !important; width: 100% !important; padding: 0 !important; }
    .flex { display: block !important; }
    
    .print-header {
        text-align: center;
        margin-bottom: 25px;
        border-bottom: 2px solid #333;
        padding-bottom: 12px;
    }
    .print-header h2 { font-size: 18px; margin: 0 0 5px 0; font-weight: bold; color: #333; }
    .print-header h4 { font-size: 14px; margin: 0 0 8px 0; color: #555; }
    .print-header p { margin: 2px 0; font-size: 12px; color: #666; }
    
    .print-summary {
        display: flex;
        justify-content: space-between;
        margin: 30px 0;
        border: 2px solid #000;
        padding: 20px 15px;
        background: #f8f9fa;
        border-radius: 8px;
    }
    .print-summary div { 
        text-align: center; 
        flex: 1; 
        padding: 0 10px;
        border-right: 1px solid #ccc;
    }
    .print-summary div:last-child { border-right: none; }
    .print-summary strong { font-size: 14px; font-weight: bold; color: #333; }
    
    table { 
        border-collapse: collapse; 
        width: 100%; 
        margin-top: 20px;
        font-size: 11px;
    }
    th, td { 
        border: 1px solid #000; 
        padding: 8px 6px; 
        text-align: left;
        vertical-align: top;
    }
    th { 
        background-color: #e9ecef !important; 
        font-weight: bold;
        text-align: center;
    }
    
    .text-green-600 { color: #059669 !important; }
    .text-red-600 { color: #dc2626 !important; }
    
    .page-break { page-break-before: always; }
}

.print-only { display: none; }
.hidden { display: none; }
</style>
@endsection