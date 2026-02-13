@extends('layouts.app')

@section('title', 'Laporan Zakat - Masjid Abal Qosim')
@section('page-title', 'Laporan Zakat')

@section('content')
<div class="mb-6">
    <x-admin.section-card>
        <form method="GET" action="{{ route('reports.zakat') }}">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
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
                        <option value="fitrah" {{ $type == 'fitrah' ? 'selected' : '' }}>Zakat Fitrah</option>
                        <option value="maal" {{ $type == 'maal' ? 'selected' : '' }}>Zakat Maal</option>
                        <option value="shodaqoh" {{ $type == 'shodaqoh' ? 'selected' : '' }}>Shodaqoh</option>
                    </select>
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

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <x-admin.stat-card
        label="Zakat"
        :value="'Rp ' . number_format($totalZakat, 0, ',', '.')"
        icon="fa-moon"
        tone="blue"
    />
    <x-admin.stat-card
        label="Zakat Maal"
        :value="'Rp ' . number_format($totalZakatMaal, 0, ',', '.')"
        icon="fa-coins"
        tone="emerald"
    />
    <x-admin.stat-card
        label="Shodaqoh"
        :value="'Rp ' . number_format($totalShodaqoh, 0, ',', '.')"
        icon="fa-heart"
        tone="purple"
    />
    <x-admin.stat-card
        label="Total"
        :value="'Rp ' . number_format($grandTotal, 0, ',', '.')"
        icon="fa-chart-line"
        tone="amber"
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

@if($type == 'all' || $type == 'fitrah')
<x-admin.section-card title="Data Zakat" icon="fa-moon" class="mb-6">
        @if($zakat->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pembayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Jiwa</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jenis Bayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($zakat as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>
                            <td class="px-4 py-3 text-sm font-semibold">
                                <div class="flex items-center gap-2">
                                    <span class="flex-1 truncate">{{ $item->nama_pembayar }}</span>
                                    <button onclick="showMuzakki({{ $item->id }})" class="flex-shrink-0 text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-users"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->jumlah_jiwa }} jiwa</td>
                            <td class="px-4 py-3 text-sm">
                                @if($item->jenis_bayar == 'beras')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Beras</span>
                                @else
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Tunai</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-bold">
                                @if($item->jenis_bayar == 'beras')
                                    <span class="text-yellow-600">{{ number_format($item->jumlah_beras, 2, ',', '.') }} kg</span>
                                @else
                                    <span class="text-green-600">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada data zakat</p>
            </div>
        @endif
</x-admin.section-card>
@endif

@if($type == 'all' || $type == 'maal')
<x-admin.section-card title="Data Zakat Maal" icon="fa-coins" class="mb-6">
        @if($zakatMaal->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pembayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Jiwa</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($zakatMaal as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>
                            <td class="px-4 py-3 text-sm font-semibold">
                                <div class="flex items-center gap-2">
                                    <span class="flex-1 truncate">{{ $item->nama_pembayar }}</span>
                                    <button onclick="showMuzakki({{ $item->id }})" class="flex-shrink-0 text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-users"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->jumlah_jiwa }} jiwa</td>
                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada data zakat maal</p>
            </div>
        @endif
</x-admin.section-card>
@endif

@if($type == 'all' || $type == 'shodaqoh')
<x-admin.section-card title="Data Shodaqoh" icon="fa-heart" class="mb-6">
        @if($shodaqoh->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pembayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Jiwa</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($shodaqoh as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>
                            <td class="px-4 py-3 text-sm font-semibold">
                                <div class="flex items-center gap-2">
                                    <span class="flex-1 truncate">{{ $item->nama_pembayar }}</span>
                                    <button onclick="showMuzakki({{ $item->id }})" class="flex-shrink-0 text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-users"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $item->jumlah_jiwa }} jiwa</td>
                            <td class="px-4 py-3 text-sm text-green-600 font-semibold">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->keterangan ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada data shodaqoh</p>
            </div>
        @endif
</x-admin.section-card>
@endif
@endsection

@section('scripts')
<script>
const muzakkiData = {!! json_encode($zakat->merge($zakatMaal)->merge($shodaqoh)->mapWithKeys(function($z) {
    return [$z->id => ['id' => $z->id, 'muzakkis' => $z->muzakkis]];
})) !!};

function showMuzakki(id) {
    const data = muzakkiData[id];
    let html = '<div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" onclick="this.remove()">';
    html += '<div class="bg-white rounded-lg p-6 max-w-md w-full mx-4" onclick="event.stopPropagation()">';
    html += '<div class="flex justify-between items-center mb-4">';
    html += '<h3 class="text-lg font-semibold">Daftar Muzakki</h3>';
    html += '<button onclick="this.closest(\'.fixed\').remove()" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></button>';
    html += '</div>';
    html += '<div class="space-y-2">';
    data.muzakkis.forEach((m, i) => {
        html += `<div class="border-b pb-2"><span class="font-medium">${i+1}. ${m.nama}</span> <span class="text-gray-600">(${m.hubungan_keluarga})</span></div>`;
    });
    html += '</div></div></div>';
    document.body.insertAdjacentHTML('beforeend', html);
}

function printReport() {
    const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
    const startDate = '{{ $startDate }}';
    const endDate = '{{ $endDate }}';
    const type = '{{ $type }}';
    const printDate = '{{ date('d F Y') }}';
    const totalZakat = 'Rp {{ number_format($totalZakat, 0, ',', '.') }}';
    const totalZakatMaal = 'Rp {{ number_format($totalZakatMaal, 0, ',', '.') }}';
    const totalShodaqoh = 'Rp {{ number_format($totalShodaqoh, 0, ',', '.') }}';
    const grandTotal = 'Rp {{ number_format($grandTotal, 0, ',', '.') }}';
    
    let periodText = 'Semua Periode';
    if (startDate && endDate) {
        periodText = `${startDate} s/d ${endDate}`;
    } else if (startDate) {
        periodText = `Dari ${startDate}`;
    } else if (endDate) {
        periodText = `Sampai ${endDate}`;
    }
    
    let typeText = 'Semua Jenis';
    if (type === 'fitrah') typeText = 'Zakat Fitrah';
    else if (type === 'maal') typeText = 'Zakat Maal';
    else if (type === 'shodaqoh') typeText = 'Shodaqoh';
    
    let content = '<html><head><title>Laporan Zakat</title>';
    content += '<style>@page{size:A4;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:5px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:22px;font-weight:bold}h3{margin:10px 0 5px;font-size:14px;text-align:center;font-weight:bold}hr{margin:2px 0;border:none;border-top:2px solid #000}.summary{display:flex;justify-content:space-between;margin:20px 0;border:2px solid #000;padding:15px;background:#f8f9fa}.summary div{text-align:center;flex:1;border-right:1px solid #ccc}.summary div:last-child{border-right:none}table{width:100%;margin-top:20px;font-size:11px;border-collapse:collapse}th,td{border:1px solid #000;padding:8px 6px;text-align:left}th{background-color:#e9ecef;font-weight:bold;text-align:center}.text-green{color:#059669}</style>';
    content += '</head><body>';
    content += '<div class="header">';
    content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
    content += '<div class="header-text">';
    content += '<h2>MASJID ABAL QOSIM</h2>';
    content += '<p style="margin:0;font-size:9px">JL. Menur Gg V No. 48 Surabaya</p>';
    content += '<p style="margin:0;font-size:9px">Telp 085883112301 / 082245559338 / 081216303887</p>';
    content += '</div></div>';
    content += '<hr>';
    content += '<h3>LAPORAN ZAKAT</h3>';
    content += `<p style="text-align:center;margin:0 0 5px;font-size:12px;font-weight:bold">Periode: ${periodText}</p>`;
    content += `<p style="text-align:center;margin:0 0 5px;font-size:12px;font-weight:bold">Jenis: ${typeText}</p>`;
    content += `<p style="text-align:center;margin:0 0 15px;font-size:10px;color:#666">Tanggal Cetak: ${printDate}</p>`;
    content += '<div class="summary">';
    content += `<div><strong>Zakat Fitrah:</strong><br>${totalZakat}</div>`;
    content += `<div><strong>Zakat Maal:</strong><br>${totalZakatMaal}</div>`;
    content += `<div><strong>Shodaqoh:</strong><br>${totalShodaqoh}</div>`;
    content += `<div><strong>Total:</strong><br>${grandTotal}</div>`;
    content += '</div>';
    
    @if($type == 'all' || $type == 'fitrah')
    if ({{ $zakat->count() }} > 0) {
        content += '<h4 style="margin-top:20px;font-size:13px;font-weight:bold">Data Zakat Fitrah</h4>';
        content += '<table><thead><tr>';
        content += '<th>Tanggal</th><th>Nama Pembayar</th><th>Jumlah Jiwa</th><th>Jenis Bayar</th><th>Total</th><th>Keterangan</th>';
        content += '</tr></thead><tbody>';
        @foreach($zakat as $item)
        content += '<tr>';
        content += '<td>{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>';
        content += '<td>{{ $item->nama_pembayar }}</td>';
        content += '<td>{{ $item->jumlah_jiwa }} jiwa</td>';
        content += '<td>{{ $item->jenis_bayar == 'beras' ? 'Beras' : 'Tunai' }}</td>';
        @if($item->jenis_bayar == 'beras')
        content += '<td class="text-green">{{ number_format($item->jumlah_beras, 2, ',', '.') }} kg</td>';
        @else
        content += '<td class="text-green">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>';
        @endif
        content += '<td>{{ $item->keterangan ?? '-' }}</td>';
        content += '</tr>';
        @endforeach
        content += '</tbody></table>';
    }
    @endif
    
    @if($type == 'all' || $type == 'maal')
    if ({{ $zakatMaal->count() }} > 0) {
        content += '<h4 style="margin-top:20px;font-size:13px;font-weight:bold">Data Zakat Maal</h4>';
        content += '<table><thead><tr>';
        content += '<th>Tanggal</th><th>Nama Pembayar</th><th>Jumlah Jiwa</th><th>Total</th><th>Keterangan</th>';
        content += '</tr></thead><tbody>';
        @foreach($zakatMaal as $item)
        content += '<tr>';
        content += '<td>{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>';
        content += '<td>{{ $item->nama_pembayar }}</td>';
        content += '<td>{{ $item->jumlah_jiwa }} jiwa</td>';
        content += '<td class="text-green">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>';
        content += '<td>{{ $item->keterangan ?? '-' }}</td>';
        content += '</tr>';
        @endforeach
        content += '</tbody></table>';
    }
    @endif
    
    @if($type == 'all' || $type == 'shodaqoh')
    if ({{ $shodaqoh->count() }} > 0) {
        content += '<h4 style="margin-top:20px;font-size:13px;font-weight:bold">Data Shodaqoh</h4>';
        content += '<table><thead><tr>';
        content += '<th>Tanggal</th><th>Nama Pembayar</th><th>Jumlah Jiwa</th><th>Total</th><th>Keterangan</th>';
        content += '</tr></thead><tbody>';
        @foreach($shodaqoh as $item)
        content += '<tr>';
        content += '<td>{{ date('d/m/Y', strtotime($item->tanggal_bayar)) }}</td>';
        content += '<td>{{ $item->nama_pembayar }}</td>';
        content += '<td>{{ $item->jumlah_jiwa }} jiwa</td>';
        content += '<td class="text-green">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>';
        content += '<td>{{ $item->keterangan ?? '-' }}</td>';
        content += '</tr>';
        @endforeach
        content += '</tbody></table>';
    }
    @endif
    
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
