@extends('layouts.app')

@section('title', 'Laporan Inventaris - Masjid Abal Qosim')
@section('page-title', 'Laporan Inventaris')

@section('content')
<div class="mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('reports.inventaris') }}">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" name="kategori">
                        <option value="all" {{ $kategori == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="elektronik" {{ $kategori == 'elektronik' ? 'selected' : '' }}>Elektronik</option>
                        <option value="furniture" {{ $kategori == 'furniture' ? 'selected' : '' }}>Furniture</option>
                        <option value="alat_ibadah" {{ $kategori == 'alat_ibadah' ? 'selected' : '' }}>Alat Ibadah</option>
                        <option value="alat_kebersihan" {{ $kategori == 'alat_kebersihan' ? 'selected' : '' }}>Alat Kebersihan</option>
                        <option value="lainnya" {{ $kategori == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kondisi</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" name="kondisi">
                        <option value="all" {{ $kondisi == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="baik" {{ $kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                        <option value="rusak_ringan" {{ $kondisi == 'rusak_ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="rusak_berat" {{ $kondisi == 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
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

<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Barang</h6>
                <h4 class="text-xl font-bold">{{ number_format($totalBarang, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-boxes text-2xl"></i>
        </div>
    </div>
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Kondisi Baik</h6>
                <h4 class="text-xl font-bold">{{ number_format($barangBaik, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-check-circle text-2xl"></i>
        </div>
    </div>
    <div class="bg-yellow-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Rusak Ringan</h6>
                <h4 class="text-xl font-bold">{{ number_format($barangRusakRingan, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-exclamation-triangle text-2xl"></i>
        </div>
    </div>
    <div class="bg-red-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Rusak Berat</h6>
                <h4 class="text-xl font-bold">{{ number_format($barangRusakBerat, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-times-circle text-2xl"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 gap-4 mb-6">
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="flex items-center justify-center h-full">
            <button onclick="printReport()" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full">
                <i class="fas fa-print mr-2"></i>
                Cetak Laporan
            </button>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Detail Inventaris
        </h5>
    </div>
    <div class="p-6">
        @if($inventaris->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kode</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Barang</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kategori</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kondisi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Lokasi</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($inventaris as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm font-semibold">{{ $item->kode_barang }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->nama_barang }}</td>
                            <td class="px-4 py-3 text-sm">{{ ucfirst(str_replace('_', ' ', $item->kategori)) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->jumlah }} {{ $item->satuan }}</td>
                            <td class="px-4 py-3 text-sm">{{ ucfirst(str_replace('_', ' ', $item->kondisi)) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $item->lokasi }}</td>
                            <td class="px-4 py-3 text-sm">Rp {{ number_format($item->harga_perolehan ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Tidak ada data inventaris</p>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
function printReport() {
    const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
    const printDate = '{{ date('d F Y') }}';
    const totalBarang = '{{ number_format($totalBarang, 0, ',', '.') }}';
    const totalNilai = 'Rp {{ number_format($totalNilai, 0, ',', '.') }}';
    const barangBaik = '{{ number_format($barangBaik, 0, ',', '.') }}';
    const barangRusakRingan = '{{ number_format($barangRusakRingan, 0, ',', '.') }}';
    const barangRusakBerat = '{{ number_format($barangRusakBerat, 0, ',', '.') }}';
    
    let content = '<html><head><title>Laporan Inventaris</title>';
    content += '<style>@page{size:A4 landscape;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:5px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:22px;font-weight:bold}h3{margin:10px 0 5px;font-size:14px;text-align:center;font-weight:bold}hr{margin:2px 0;border:none;border-top:2px solid #000}.summary{display:flex;justify-content:space-between;margin:20px 0;border:2px solid #000;padding:15px;background:#f8f9fa}.summary div{text-align:center;flex:1;border-right:1px solid #ccc}.summary div:last-child{border-right:none}table{width:100%;margin-top:20px;font-size:11px;border-collapse:collapse}th,td{border:1px solid #000;padding:8px 6px;text-align:left}th{background-color:#e9ecef;font-weight:bold;text-align:center}</style>';
    content += '</head><body>';
    content += '<div class="header">';
    content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
    content += '<div class="header-text">';
    content += '<h2>MASJID ABAL QOSIM</h2>';
    content += '<p style="margin:0;font-size:9px">JL. Menur Gg V No. 48 Surabaya</p>';
    content += '<p style="margin:0;font-size:9px">Telp 085883112301 / 082245559338 / 081216303887</p>';
    content += '</div></div>';
    content += '<hr>';
    content += '<h3>LAPORAN INVENTARIS</h3>';
    content += `<p style="text-align:center;margin:0 0 15px;font-size:10px;color:#666">Tanggal Cetak: ${printDate}</p>`;
    content += '<div class="summary">';
    content += `<div><strong>Total Barang:</strong><br>${totalBarang}</div>`;
    content += `<div><strong>Total Nilai:</strong><br>${totalNilai}</div>`;
    content += `<div><strong>Kondisi Baik:</strong><br>${barangBaik}</div>`;
    content += `<div><strong>Rusak Ringan:</strong><br>${barangRusakRingan}</div>`;
    content += `<div><strong>Rusak Berat:</strong><br>${barangRusakBerat}</div>`;
    content += '</div>';
    content += '<table><thead><tr>';
    content += '<th>Kode</th><th>Nama Barang</th><th>Kategori</th><th>Jumlah</th><th>Kondisi</th><th>Lokasi</th><th>Harga</th>';
    content += '</tr></thead><tbody>';
    
    @foreach($inventaris as $item)
    content += '<tr>';
    content += '<td>{{ $item->kode_barang }}</td>';
    content += '<td>{{ $item->nama_barang }}</td>';
    content += '<td>{{ ucfirst(str_replace('_', ' ', $item->kategori)) }}</td>';
    content += '<td>{{ $item->jumlah }} {{ $item->satuan }}</td>';
    content += '<td>{{ ucfirst(str_replace('_', ' ', $item->kondisi)) }}</td>';
    content += '<td>{{ $item->lokasi }}</td>';
    content += '<td>Rp {{ number_format($item->harga_perolehan ?? 0, 0, ',', '.') }}</td>';
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
