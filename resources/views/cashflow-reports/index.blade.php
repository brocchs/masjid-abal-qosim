@extends('layouts.app')

@section('title', 'Laporan Keuangan - Masjid Abal Qosim')
@section('page-title', 'Keuangan Masjid')

@section('content')
<div class="no-print">
<div class="mb-6">
    <x-admin.section-card>
        <form method="GET" action="{{ route('cashflow-reports.index') }}">
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
    </x-admin.section-card>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <x-admin.stat-card
        label="Pemasukan"
        :value="'Rp ' . number_format($totalCredit, 0, ',', '.')"
        icon="fa-arrow-trend-up"
        tone="emerald"
    />
    <x-admin.stat-card
        label="Pengeluaran"
        :value="'Rp ' . number_format($totalDebit, 0, ',', '.')"
        icon="fa-arrow-trend-down"
        tone="red"
    />
    <x-admin.stat-card
        :label="'Saldo ' . \Carbon\Carbon::parse($month)->format('F Y')"
        :value="'Rp ' . number_format(abs($balance), 0, ',', '.')"
        icon="fa-wallet"
        :tone="$balance >= 0 ? 'blue' : 'amber'"
        :hint="$balance >= 0 ? 'Surplus' : 'Defisit'"
    />
    <x-admin.stat-card
        label="Saldo Akhir"
        :value="'Rp ' . number_format(abs($totalBalance), 0, ',', '.')"
        icon="fa-coins"
        :tone="$totalBalance >= 0 ? 'purple' : 'amber'"
        hint="Keseluruhan"
    />
</div>

<div class="grid grid-cols-1 gap-4 mb-6">
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-4">
        <div class="flex items-center justify-center h-full">
            <button onclick="printReport()" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg w-full">
                <i class="fas fa-print mr-2"></i>
                Cetak Laporan
            </button>
        </div>
    </div>
</div>
</div>

<x-admin.section-card :title="'Detail Transaksi - ' . \Carbon\Carbon::parse($month)->format('F Y')" icon="fa-list" headerClass="no-print">
        @if($cashflows->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jenis</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Deskripsi</th>
                            <th class="px-4 py-3 text-right text-sm font-medium text-gray-700">Jumlah</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Diinput Oleh</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 no-print">Invoice</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($cashflows as $cashflow)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $cashflow->transaction_date->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded no-print {{ $cashflow->type == 'credit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $cashflow->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                                <span class="hidden print-inline">
                                    {{ $cashflow->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $cashflow->description }}</td>
                            <td class="px-4 py-3 text-sm text-right {{ $cashflow->type == 'credit' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $cashflow->type == 'credit' ? '+' : '-' }} Rp {{ number_format($cashflow->amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $cashflow->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 no-print">
                                @if($cashflow->invoice_file)
                                    <a href="{{ asset($cashflow->invoice_file) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
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
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada transaksi pada bulan ini</p>
            </div>
        @endif
</x-admin.section-card>
@endsection

@section('scripts')
<script>
function printReport() {
    const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
    const month = '{{ \Carbon\Carbon::parse($month)->format('F Y') }}';
    const printDate = '{{ date('d F Y') }}';
    const totalCredit = 'Rp {{ number_format($totalCredit, 0, ',', '.') }}';
    const totalDebit = 'Rp {{ number_format($totalDebit, 0, ',', '.') }}';
    const balance = 'Rp {{ number_format(abs($balance), 0, ',', '.') }}';
    const balanceStatus = '{{ $balance >= 0 ? 'Surplus' : 'Defisit' }}';
    const totalBalance = 'Rp {{ number_format(abs($totalBalance), 0, ',', '.') }}';
    
    let content = '<html><head><title>Laporan Keuangan</title>';
    content += '<style>@page{size:A4;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:5px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:22px;font-weight:bold}h3{margin:10px 0 5px;font-size:14px;text-align:center;font-weight:bold}hr{margin:2px 0;border:none;border-top:2px solid #000}.summary{display:flex;justify-content:space-between;margin:20px 0;border:2px solid #000;padding:15px;background:#f8f9fa}.summary div{text-align:center;flex:1;border-right:1px solid #ccc}.summary div:last-child{border-right:none}table{width:100%;margin-top:20px;font-size:11px;border-collapse:collapse}th,td{border:1px solid #000;padding:8px 6px;text-align:left}th{background-color:#e9ecef;font-weight:bold;text-align:center}.text-green{color:#059669}.text-red{color:#dc2626}</style>';
    content += '</head><body>';
    content += '<div class="header">';
    content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
    content += '<div class="header-text">';
    content += '<h2>MASJID ABAL QOSIM</h2>';
    content += '<p style="margin:0;font-size:9px">JL. Menur Gg V No. 48 Surabaya</p>';
    content += '<p style="margin:0;font-size:9px">Telp 085883112301 / 082245559338 / 081216303887</p>';
    content += '</div></div>';
    content += '<hr>';
    content += '<h3>LAPORAN KEUANGAN</h3>';
    content += `<p style="text-align:center;margin:0 0 5px;font-size:12px;font-weight:bold">Periode: ${month}</p>`;
    content += `<p style="text-align:center;margin:0 0 15px;font-size:10px;color:#666">Tanggal Cetak: ${printDate}</p>`;
    content += '<div class="summary">';
    content += `<div><strong>Total Pemasukan:</strong><br>${totalCredit}</div>`;
    content += `<div><strong>Total Pengeluaran:</strong><br>${totalDebit}</div>`;
    content += `<div><strong>Saldo ${month}:</strong><br>${balance} (${balanceStatus})</div>`;
    content += `<div><strong>Saldo Akhir:</strong><br>${totalBalance}<br><small style="font-size:9px">(Keseluruhan)</small></div>`;
    content += '</div>';
    content += '<table><thead><tr>';
    content += '<th>Tanggal</th><th>Jenis</th><th>Deskripsi</th><th style="text-align:right">Jumlah</th><th>Diinput Oleh</th>';;
    content += '</tr></thead><tbody>';
    
    @foreach($cashflows as $cashflow)
    content += '<tr>';
    content += '<td>{{ $cashflow->transaction_date->format('d/m/Y') }}</td>';
    content += '<td>{{ $cashflow->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}</td>';
    content += '<td>{{ $cashflow->description }}</td>';
    content += '<td style="text-align:right" class="{{ $cashflow->type == 'credit' ? 'text-green' : 'text-red' }}">{{ $cashflow->type == 'credit' ? '+' : '-' }} Rp {{ number_format($cashflow->amount, 0, ',', '.') }}</td>';
    content += '<td>{{ $cashflow->user->name ?? 'Unknown' }}</td>';
    content += '</tr>';
    @endforeach
    
    content += '</tbody></table>';
    content += '</body></html>';
    
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(content);
    printWindow.document.close();
    setTimeout(() => {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }, 250);
}
</script>
@endsection
