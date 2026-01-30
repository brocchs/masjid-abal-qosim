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
        <div class="text-center space-y-2">
            <a href="{{ route('zakat.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Data Zakat
            </a>
            <button onclick="showDoaModal()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full">
                <i class="fas fa-book-open mr-2"></i>
                Doa Zakat Fitrah
            </button>
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
                                <div class="flex items-center gap-2">
                                    <span class="flex-1 truncate">{{ $zakat->nama_pembayar }}</span>
                                    <button onclick="showMuzakki({{ $zakat->id }})" class="flex-shrink-0 text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-users"></i>
                                    </button>
                                </div>
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
        'muzakkis' => $z->muzakkis,
        'user_name' => $z->user->name ?? 'Unknown'
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

function showDoaModal() {
    let html = '<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 p-4" onclick="this.remove()">';
    html += '<div class="bg-white rounded-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden flex flex-col shadow-2xl" onclick="event.stopPropagation()">';
    html += '<div class="bg-gradient-to-r from-masjid-green to-masjid-green-light p-6">';
    html += '<div class="flex justify-between items-center">';
    html += '<div class="flex items-center space-x-3">';
    html += '<div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center">';
    html += '<i class="fas fa-book-quran text-white text-xl"></i>';
    html += '</div>';
    html += '<h3 class="text-2xl font-bold text-white">Niat & Doa Zakat Fitrah</h3>';
    html += '</div>';
    html += '<button onclick="this.closest(\'.fixed\').remove()" class="text-white hover:bg-white hover:bg-opacity-20 w-10 h-10 rounded-full transition-all"><i class="fas fa-times text-xl"></i></button>';
    html += '</div>';
    html += '</div>';
    html += '<div class="overflow-y-auto p-6 bg-gray-50">';
    html += '<div class="space-y-5">';
    
    html += '<div class="bg-gradient-to-br from-green-50 to-emerald-50 p-5 rounded-xl border border-green-200 shadow-sm">';
    html += '<div class="flex items-center mb-4">';
    html += '<div class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-bold mr-3">1</div>';
    html += '<p class="font-bold text-lg text-green-700">Niat Zakat Fitrah untuk diri sendiri</p>';
    html += '</div>';
    html += '<div class="bg-white p-5 rounded-lg mb-3 shadow-md border-2 border-green-100">';
    html += '<p class="text-2xl mb-3 text-center leading-loose text-green-800" style="direction:rtl">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ الْفِطْرِ عَنْ نَفْسِي فَرْضًا لِلّٰهِ تَعَالَى</p>';
    html += '</div>';
    html += '<div class="bg-green-100 p-3 rounded-lg mb-2">';
    html += '<p class="text-sm text-green-900"><i class="fas fa-language mr-2"></i><strong>Latin:</strong> Nawaitu an ukhrija zakātal-fiṭri \'an nafsī farḍan lillāhi ta\'ālā.</p>';
    html += '</div>';
    html += '<div class="bg-white p-3 rounded-lg border-l-4 border-green-500">';
    html += '<p class="text-sm text-gray-700"><i class="fas fa-comment-dots mr-2 text-green-600"></i><strong>Artinya:</strong> Saya niat mengeluarkan zakat fitrah untuk diri saya sendiri, fardhu karena Allah Ta\'ala.</p>';
    html += '</div>';
    html += '</div>';
    
    html += '<div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-5 rounded-xl border border-blue-200 shadow-sm">';
    html += '<div class="flex items-center mb-4">';
    html += '<div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold mr-3">2</div>';
    html += '<p class="font-bold text-lg text-blue-700">Niat Zakat Fitrah untuk keluarga</p>';
    html += '</div>';
    html += '<div class="space-y-3">';
    
    html += '<div class="bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-400">';
    html += '<p class="font-semibold mb-3 text-blue-700 flex items-center"><i class="fas fa-female mr-2"></i>a) Untuk istri</p>';
    html += '<div class="bg-blue-50 p-3 rounded-lg mb-2">';
    html += '<p class="text-xl mb-2 text-center leading-loose text-blue-800" style="direction:rtl">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ الْفِطْرِ عَنْ زَوْجَتِي فَرْضًا لِلّٰهِ تَعَالَى</p>';
    html += '</div>';
    html += '<div class="bg-blue-100 p-3 rounded-lg mb-2">';
    html += '<p class="text-xs text-blue-900"><i class="fas fa-language mr-2"></i><strong>Latin:</strong> Nawaitu an ukhrija zakātal-fiṭri \'an zawjatī farḍan lillāhi ta\'ālā.</p>';
    html += '</div>';
    html += '<div class="bg-white p-3 rounded-lg border-l-4 border-blue-500">';
    html += '<p class="text-xs text-gray-700"><i class="fas fa-comment-dots mr-2 text-blue-600"></i><strong>Artinya:</strong> Saya niat mengeluarkan zakat fitrah untuk istri saya, fardhu karena Allah Ta\'ala.</p>';
    html += '</div>';
    html += '</div>';
    
    html += '<div class="bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-400">';
    html += '<p class="font-semibold mb-3 text-blue-700 flex items-center"><i class="fas fa-child mr-2"></i>b) Untuk anak</p>';
    html += '<div class="bg-blue-50 p-3 rounded-lg mb-2">';
    html += '<p class="text-xl mb-2 text-center leading-loose text-blue-800" style="direction:rtl">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ الْفِطْرِ عَنْ وَلَدِي فَرْضًا لِلّٰهِ تَعَالَى</p>';
    html += '</div>';
    html += '<div class="bg-blue-100 p-3 rounded-lg mb-2">';
    html += '<p class="text-xs text-blue-900"><i class="fas fa-language mr-2"></i><strong>Latin:</strong> Nawaitu an ukhrija zakātal-fiṭri \'an waladī farḍan lillāhi ta\'ālā.</p>';
    html += '</div>';
    html += '<div class="bg-white p-3 rounded-lg border-l-4 border-blue-500">';
    html += '<p class="text-xs text-gray-700"><i class="fas fa-comment-dots mr-2 text-blue-600"></i><strong>Artinya:</strong> Saya niat mengeluarkan zakat fitrah untuk anak saya, fardhu karena Allah Ta\'ala.</p>';
    html += '</div>';
    html += '</div>';
    
    html += '<div class="bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-400">';
    html += '<p class="font-semibold mb-3 text-blue-700 flex items-center"><i class="fas fa-users mr-2"></i>c) Untuk keluarga/tanggungan (umum)</p>';
    html += '<div class="bg-blue-50 p-3 rounded-lg mb-2">';
    html += '<p class="text-xl mb-2 text-center leading-loose text-blue-800" style="direction:rtl">نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ الْفِطْرِ عَمَّنْ تَلْزَمُنِي نَفَقَتُهُمْ فَرْضًا لِلّٰهِ تَعَالَى</p>';
    html += '</div>';
    html += '<div class="bg-blue-100 p-3 rounded-lg mb-2">';
    html += '<p class="text-xs text-blue-900"><i class="fas fa-language mr-2"></i><strong>Latin:</strong> Nawaitu an ukhrija zakātal-fiṭri \'amman talzamunī nafaqatuhum farḍan lillāhi ta\'ālā.</p>';
    html += '</div>';
    html += '<div class="bg-white p-3 rounded-lg border-l-4 border-blue-500">';
    html += '<p class="text-xs text-gray-700"><i class="fas fa-comment-dots mr-2 text-blue-600"></i><strong>Artinya:</strong> Saya niat mengeluarkan zakat fitrah untuk orang-orang yang menjadi tanggungan saya, fardhu karena Allah Ta\'ala.</p>';
    html += '</div>';
    html += '</div>';
    
    html += '</div>';
    html += '</div>';
    
    html += '<div class="bg-gradient-to-br from-purple-50 to-pink-50 p-5 rounded-xl border border-purple-200 shadow-sm">';
    html += '<div class="flex items-center mb-3">';
    html += '<div class="w-8 h-8 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold mr-3">3</div>';
    html += '<p class="font-bold text-lg text-purple-700">Doa setelah menyerahkan zakat</p>';
    html += '</div>';
    html += '<p class="text-xs text-purple-600 mb-3 italic bg-purple-100 p-2 rounded"><i class="fas fa-info-circle mr-1"></i>Sering dibaca oleh penerima/amil</p>';
    html += '<div class="bg-white p-5 rounded-lg mb-3 shadow-md border-2 border-purple-100">';
    html += '<p class="text-2xl mb-3 text-center leading-loose text-purple-800" style="direction:rtl">تَقَبَّلَ اللّٰهُ مِنَّا وَمِنْكُمْ، تَقَبَّلْ يَا كَرِيْمُ</p>';
    html += '</div>';
    html += '<div class="bg-purple-100 p-3 rounded-lg mb-2">';
    html += '<p class="text-sm text-purple-900"><i class="fas fa-language mr-2"></i><strong>Latin:</strong> Taqabbalallāhu minnā wa minkum, taqabbal yā karīm.</p>';
    html += '</div>';
    html += '<div class="bg-white p-3 rounded-lg border-l-4 border-purple-500">';
    html += '<p class="text-sm text-gray-700"><i class="fas fa-comment-dots mr-2 text-purple-600"></i><strong>Artinya:</strong> Semoga Allah menerima dari kami dan dari kalian. Terimalah (amal kami), wahai Yang Maha Mulia.</p>';
    html += '</div>';
    html += '</div>';
    
    html += '</div></div></div></div>';
    document.body.insertAdjacentHTML('beforeend', html);
}

function printReceipt(id) {
    const data = zakatData[id];
    const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
    
    // Load image first
    const img = new Image();
    img.onload = function() {
        let content = '<html><head><title>Tanda Terima Zakat Fitrah</title>';
        content += '<style>@page{size:A5;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:5px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:22px;font-weight:bold}h3{margin:10px 0 15px;font-size:14px;text-align:center}table{width:100%;margin-bottom:15px;font-size:11px}td{padding:3px}hr{margin:2px 0;border:none;border-top:2px solid #000}.muzakki{margin-left:15px;font-size:11px}.footer{margin-top:30px;text-align:right;font-size:11px}</style>';;
        content += '</head><body>';
        content += '<div class="header">';
        content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
        content += '<div class="header-text">';
        content += '<h2>MASJID ABAL QOSIM</h2>';
        content += '<p style="margin:0;font-size:9px">JL. Menur Gg V No. 48 Surabaya</p>';
        content += '<p style="margin:0;font-size:9px">Telp 085883112301 / 082245559338 / 081216303887</p>';
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
        content += '<p style="margin:0">(' + data.user_name + ')</p>';
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