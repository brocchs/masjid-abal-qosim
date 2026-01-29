@extends('layouts.app')

@section('title', 'Zakat Fitrah - Masjid Abal Qosim')
@section('page-title', 'Zakat Fitrah')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-blue-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Zakat Tunai</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalZakat, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-hand-holding-heart text-2xl"></i>
        </div>
    </div>
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Jiwa</h6>
                <h4 class="text-xl font-bold">{{ number_format($totalJiwa, 0, ',', '.') }} Jiwa</h4>
            </div>
            <i class="fas fa-users text-2xl"></i>
        </div>
    </div>
    <div class="bg-yellow-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Beras</h6>
                <h4 class="text-xl font-bold">{{ number_format($totalBeras, 2, ',', '.') }} kg</h4>
            </div>
            <i class="fas fa-seedling text-2xl"></i>
        </div>
    </div>
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('zakat.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Data Zakat
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Pembayar Zakat Fitrah
        </h5>
    </div>
    <div class="p-6">
        @if($zakats->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tanggal</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Nama Pembayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jumlah Jiwa</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Jenis Bayar</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Harga/Jiwa</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Total</th>
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Diinput Oleh</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($zakats as $zakat)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $zakat->tanggal_bayar->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                {{ $zakat->nama_pembayar }}
                                <button onclick="showMuzakki({{ $zakat->id }})" class="ml-2 text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-users"></i>
                                </button>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $zakat->jumlah_jiwa }} jiwa</td>
                            <td class="px-4 py-3 text-sm">
                                @if($zakat->jenis_bayar == 'beras')
                                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Beras</span>
                                @else
                                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Tunai</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">
                                @if($zakat->jenis_bayar == 'tunai')
                                    Rp {{ number_format($zakat->harga_per_jiwa, 0, ',', '.') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm font-bold">
                                @if($zakat->jenis_bayar == 'beras')
                                    <span class="text-yellow-600">{{ number_format($zakat->jumlah_beras, 2, ',', '.') }} kg</span>
                                @else
                                    <span class="text-green-600">Rp {{ number_format($zakat->total_bayar, 0, ',', '.') }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $zakat->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button onclick="printReceipt({{ $zakat->id }})" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-print"></i>
                                    </button>
                                    <a href="{{ route('zakat.edit', $zakat) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('zakat.destroy', $zakat) }}" method="POST" class="inline" onsubmit="event.preventDefault(); showDeleteModal(this);">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="flex justify-center mt-6">
                <div class="pagination-wrapper">
                    {{ $zakats->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-hand-holding-heart text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada data zakat fitrah</p>
                <a href="{{ route('zakat.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Data Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
@if(session('whatsapp_url'))
<script>
    window.open('{{ session('whatsapp_url') }}', '_blank');
</script>
@endif

<script>
const muzakkiData = {!! json_encode($zakats->mapWithKeys(function($z) {
    return [$z->id => ['id' => $z->id, 'muzakkis' => $z->muzakkis]];
})) !!};

const zakatData = {!! json_encode($zakats->mapWithKeys(function($z) {
    return [$z->id => [
        'id' => $z->id,
        'nama_pembayar' => $z->nama_pembayar,
        'tanggal_bayar' => $z->tanggal_bayar->format('d/m/Y H:i'),
        'jumlah_jiwa' => $z->jumlah_jiwa,
        'jenis_bayar' => $z->jenis_bayar,
        'jumlah_beras' => $z->jumlah_beras,
        'harga_per_jiwa' => $z->harga_per_jiwa,
        'total_bayar' => $z->total_bayar,
        'muzakkis' => $z->muzakkis
    ]];
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

function printReceipt(id) {
    const data = zakatData[id];
    const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
    
    // Load image first
    const img = new Image();
    img.onload = function() {
        let content = '<html><head><title>Tanda Terima Zakat Fitrah</title>';
        content += '<style>@page{size:A5;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:15px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:16px}h3{margin:10px 0 15px;font-size:14px;text-align:center}table{width:100%;margin-bottom:15px;font-size:11px}td{padding:3px}hr{margin:10px 0}.muzakki{margin-left:15px;font-size:11px}.footer{margin-top:30px;text-align:right;font-size:11px}</style>';;
        content += '</head><body>';
        content += '<div class="header">';
        content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
        content += '<div class="header-text">';
        content += '<h2>MASJID ABAL QOSIM</h2>';
        content += '<p style="margin:0;font-size:10px">Jl. Manyar Kartika Barat, Sukolilo, Surabaya</p>';
        content += '</div>';
        content += '</div>';
        content += '<hr>';
        content += '<h3 style="text-align:center;margin:10px 0 15px;font-size:14px">TANDA TERIMA ZAKAT FITRAH</h3>';
        content += '<table>';
        content += `<tr><td width="150">Nama Pembayar</td><td>: ${data.nama_pembayar}</td></tr>`;
        content += `<tr><td>Tanggal</td><td>: ${data.tanggal_bayar}</td></tr>`;
        content += `<tr><td>Jumlah Jiwa</td><td>: ${data.jumlah_jiwa} jiwa</td></tr>`;
        content += `<tr><td>Jenis Bayar</td><td>: ${data.jenis_bayar.charAt(0).toUpperCase() + data.jenis_bayar.slice(1)}</td></tr>`;
        if (data.jenis_bayar === 'beras') {
            content += `<tr><td>Jumlah Beras</td><td>: ${data.jumlah_beras} kg</td></tr>`;
        } else {
            content += `<tr><td>Harga per Jiwa</td><td>: Rp ${new Intl.NumberFormat('id-ID').format(data.harga_per_jiwa)}</td></tr>`;
            content += `<tr><td>Total Bayar</td><td>: Rp ${new Intl.NumberFormat('id-ID').format(data.total_bayar)}</td></tr>`;
        }
        content += '</table>';
        content += '<div style="margin-bottom:10px"><strong>Daftar Muzakki:</strong></div>';
        content += '<table style="width:100%;border-collapse:collapse;font-size:11px;margin-bottom:15px">';
        content += '<thead><tr><th style="border:1px solid #000;padding:3px;text-align:center">No</th><th style="border:1px solid #000;padding:3px;text-align:left">Nama</th><th style="border:1px solid #000;padding:3px;text-align:left">Hubungan Keluarga</th></tr></thead>';
        content += '<tbody>';
        data.muzakkis.forEach((m, i) => {
            content += `<tr><td style="border:1px solid #000;padding:3px;text-align:center">${i+1}</td><td style="border:1px solid #000;padding:3px">${m.nama}</td><td style="border:1px solid #000;padding:3px">${m.hubungan_keluarga}</td></tr>`;
        });
        content += '</tbody></table>';
        content += '<div style="margin-top:15px;font-size:10px;line-height:1.6;text-align:center">';
        content += '<p style="margin:5px 0"><strong>Doa Pemberi Zakat:</strong></p>';
        content += '<p style="margin:5px 0;font-style:italic">اَللّٰهُمَّ اجْعَلْهَا مَغْنَمًا وَلَا تَجْعَلْهَا مَغْرَمًا</p>';
        content += '<p style="margin:5px 0">"Ya Allah, jadikanlah zakat ini sebagai keuntungan dan janganlah Engkau jadikan sebagai kerugian."</p>';
        content += '<p style="margin:10px 0 5px 0"><strong>Doa Penerima Zakat:</strong></p>';
        content += '<p style="margin:5px 0;font-style:italic">آجَرَكَ اللهُ فِيْمَا أَعْطَيْتَ، وَبَارَكَ لَكَ فِيْمَا أَبْقَيْتَ، وَجَعَلَهُ لَكَ طَهُوْرًا</p>';
        content += '<p style="margin:5px 0">"Semoga Allah memberikan pahala kepadamu atas apa yang telah engkau berikan, memberkahi apa yang engkau simpan, dan menjadikannya sebagai pembersih bagimu."</p>';
        content += '</div>';
        content += '<div class="footer" style="display:flex;justify-content:space-between;align-items:flex-start;margin-top:30px;font-size:11px">';
        content += '<div style="text-align:center;width:45%">';
        content += '<p style="margin:0;height:20px;visibility:hidden">.</p>';
        content += '<p style="margin:0;height:20px">Pembayar,</p>';
        content += '<br><br><br>';
        content += `<p style="margin:0">(${data.nama_pembayar})</p>`;
        content += '</div>';
        content += '<div style="text-align:center;width:45%">';
        content += '<p style="margin:0;height:20px">Surabaya, ' + new Date().toLocaleDateString('id-ID', {day: 'numeric', month: 'long', year: 'numeric'}) + '</p>';
        content += '<p style="margin:0;height:20px">Penerima,</p>';
        content += '<br><br><br>';
        content += '<p style="margin:0">(__________________)</p>';
        content += '</div>';
        content += '</div>';
        content += '</body></html>';
        
        const printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write(content);
        printWindow.document.close();
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 250);
    };
    img.src = logoUrl;
}
</script>
@endsection