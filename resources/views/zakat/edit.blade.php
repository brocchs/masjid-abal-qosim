@extends('layouts.app')

@section('title', 'Edit Zakat - Masjid Abal Qosim')
@section('page-title', 'Edit Data Zakat')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Data Zakat
                </h5>
            </div>
            <div class="p-6">
                <form action="{{ route('zakat.update', $zakat) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="jenis_zakat" class="block text-sm font-medium text-gray-700 mb-2">Jenis Zakat</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jenis_zakat') border-red-500 @enderror" 
                                id="jenis_zakat" name="jenis_zakat" required onchange="toggleJenisZakat()">
                            <option value="fitrah" {{ old('jenis_zakat', $zakat->jenis_zakat) == 'fitrah' ? 'selected' : '' }}>Zakat Fitrah</option>
                            <option value="maal" {{ old('jenis_zakat', $zakat->jenis_zakat) == 'maal' ? 'selected' : '' }}>Zakat Maal</option>
                            <option value="shodaqoh" {{ old('jenis_zakat', $zakat->jenis_zakat) == 'shodaqoh' ? 'selected' : '' }}>Shodaqoh</option>
                        </select>
                        @error('jenis_zakat')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="nama_pembayar" class="block text-sm font-medium text-gray-700 mb-2">Nama Pembayar</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('nama_pembayar') border-red-500 @enderror" 
                                   id="nama_pembayar" name="nama_pembayar" value="{{ old('nama_pembayar', $zakat->nama_pembayar) }}" 
                                   placeholder="Masukkan nama pembayar" required>
                            @error('nama_pembayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="no_whatsapp" class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('no_whatsapp') border-red-500 @enderror" 
                                   id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp', $zakat->no_whatsapp) }}" 
                                   placeholder="08xxxxxxxxxx" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            @error('no_whatsapp')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Bayar</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('tanggal_bayar') border-red-500 @enderror" 
                                   id="tanggal_bayar" name="tanggal_bayar" 
                                   value="{{ old('tanggal_bayar', $zakat->tanggal_bayar->format('Y-m-d')) }}" required>
                            @error('tanggal_bayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_jiwa" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Jiwa</label>
                            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah_jiwa') border-red-500 @enderror" 
                                   id="jumlah_jiwa" name="jumlah_jiwa" value="{{ old('jumlah_jiwa', $zakat->jumlah_jiwa) }}" 
                                   placeholder="0" min="1" oninput="hitungTotal(); updateMuzakkiFields()">
                            @error('jumlah_jiwa')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div id="fitrah_section">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="mb-4">
                            <label for="jenis_bayar" class="block text-sm font-medium text-gray-700 mb-2">Jenis Bayar</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jenis_bayar') border-red-500 @enderror" 
                                    id="jenis_bayar" name="jenis_bayar" onchange="toggleJenisBayar()">
                                <option value="tunai" {{ old('jenis_bayar', $zakat->jenis_bayar) == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="beras" {{ old('jenis_bayar', $zakat->jenis_bayar) == 'beras' ? 'selected' : '' }}>Beras</option>
                            </select>
                            @error('jenis_bayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>

                    <div id="tunai_section">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label for="harga_per_jiwa" class="block text-sm font-medium text-gray-700 mb-2">Harga per Jiwa (Rp)</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('harga_per_jiwa') border-red-500 @enderror" 
                                       id="harga_display" placeholder="0" 
                                       oninput="formatCurrency(this)" onchange="hitungTotal()">
                                <input type="hidden" id="harga_per_jiwa" name="harga_per_jiwa" value="{{ old('harga_per_jiwa', $zakat->harga_per_jiwa) }}">
                                @error('harga_per_jiwa')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="total_display" class="block text-sm font-medium text-gray-700 mb-2">Total Bayar</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-50" id="total_display" readonly>
                            </div>
                        </div>
                    </div>

                    <div id="beras_section" class="hidden mb-4">
                        <label for="jumlah_beras" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Beras (kg)</label>
                        <input type="number" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('jumlah_beras') border-red-500 @enderror" 
                               id="jumlah_beras" name="jumlah_beras" value="{{ old('jumlah_beras', $zakat->jumlah_beras) }}" 
                               placeholder="0" min="0">
                        @error('jumlah_beras')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data Muzakki</label>
                        <div id="muzakki-container">
                            @foreach($zakat->muzakkis as $index => $muzakki)
                            <div class="muzakki-item grid grid-cols-1 md:grid-cols-3 gap-4 mb-2">
                                <input type="text" name="muzakkis[{{ $index }}][nama]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Nama Muzakki" value="{{ $muzakki->nama }}">
                                <input type="text" name="muzakkis[{{ $index }}][hubungan_keluarga]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Hubungan Keluarga" value="{{ $muzakki->hubungan_keluarga }}">
                                <button type="button" onclick="removeMuzakki(this)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" onclick="addMuzakki()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm mt-2">
                            <i class="fas fa-plus mr-2"></i>Tambah Muzakki
                        </button>
                    </div>

                    <div id="maal_shodaqoh_section" class="hidden">
                        <div class="mb-4">
                            <label for="total_bayar" class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Rp)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('total_bayar') border-red-500 @enderror" 
                                   id="total_bayar_display" placeholder="0" 
                                   oninput="formatCurrencyMaal(this)">
                            <input type="hidden" id="total_bayar" name="total_bayar" value="{{ old('total_bayar', $zakat->total_bayar) }}">
                            @error('total_bayar')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('keterangan') border-red-500 @enderror" 
                                      id="keterangan" name="keterangan" rows="3" placeholder="Keterangan (opsional)">{{ old('keterangan', $zakat->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('zakat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                            <i class="fas fa-save mr-2"></i>
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function toggleJenisZakat() {
    const jenis = document.getElementById('jenis_zakat').value;
    const fitrahSection = document.getElementById('fitrah_section');
    const maalShodaqohSection = document.getElementById('maal_shodaqoh_section');
    
    if (jenis === 'fitrah') {
        fitrahSection.classList.remove('hidden');
        maalShodaqohSection.classList.add('hidden');
        document.getElementById('jumlah_jiwa').setAttribute('required', 'required');
        document.getElementById('jenis_bayar').setAttribute('required', 'required');
        document.getElementById('total_bayar').removeAttribute('required');
        document.getElementById('total_bayar').value = '';
        document.getElementById('total_bayar_display').value = '';
    } else {
        fitrahSection.classList.add('hidden');
        maalShodaqohSection.classList.remove('hidden');
        document.getElementById('jumlah_jiwa').removeAttribute('required');
        document.getElementById('jenis_bayar').removeAttribute('required');
        document.getElementById('harga_per_jiwa').removeAttribute('required');
        document.getElementById('jumlah_beras').removeAttribute('required');
        document.getElementById('total_bayar').setAttribute('required', 'required');
    }
    updateMuzakkiFields();
}

function toggleJenisBayar() {
    const jenis = document.getElementById('jenis_bayar').value;
    const tunaiSection = document.getElementById('tunai_section');
    const berasSection = document.getElementById('beras_section');
    
    if (jenis === 'beras') {
        tunaiSection.classList.add('hidden');
        berasSection.classList.remove('hidden');
        document.getElementById('harga_per_jiwa').removeAttribute('required');
        document.getElementById('jumlah_beras').setAttribute('required', 'required');
    } else {
        tunaiSection.classList.remove('hidden');
        berasSection.classList.add('hidden');
        document.getElementById('harga_per_jiwa').setAttribute('required', 'required');
        document.getElementById('jumlah_beras').removeAttribute('required');
    }
}

function formatCurrency(input) {
    let value = input.value.replace(/[^\d]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = formatted;
    document.getElementById('harga_per_jiwa').value = value;
    hitungTotal();
}

function formatCurrencyMaal(input) {
    let value = input.value.replace(/[^\d]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = formatted;
    document.getElementById('total_bayar').value = value;
}

function hitungTotal() {
    let jiwa = document.getElementById('jumlah_jiwa').value || 0;
    let harga = document.getElementById('harga_per_jiwa').value || 0;
    let total = jiwa * harga;
    document.getElementById('total_display').value = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
}

window.onload = function() {
    let initialHarga = '{{ old('harga_per_jiwa', $zakat->harga_per_jiwa) }}';
    document.getElementById('harga_display').value = new Intl.NumberFormat('id-ID').format(initialHarga);
    
    let initialTotal = '{{ old('total_bayar', $zakat->total_bayar) }}';
    document.getElementById('total_bayar_display').value = new Intl.NumberFormat('id-ID').format(initialTotal);
    
    hitungTotal();
    toggleJenisZakat();
    toggleJenisBayar();
}

let muzakkiIndex = {{ $zakat->muzakkis->count() }};

function updateMuzakkiFields() {
    const jumlahJiwa = parseInt(document.getElementById('jumlah_jiwa').value) || 0;
    if (jumlahJiwa < 1) return;
    
    const container = document.getElementById('muzakki-container');
    const currentItems = container.querySelectorAll('.muzakki-item').length;
    
    if (jumlahJiwa > currentItems) {
        for (let i = currentItems; i < jumlahJiwa; i++) {
            const newItem = document.createElement('div');
            newItem.className = 'muzakki-item grid grid-cols-1 md:grid-cols-3 gap-4 mb-2';
            newItem.innerHTML = `
                <input type="text" name="muzakkis[${i}][nama]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Nama Muzakki">
                <input type="text" name="muzakkis[${i}][hubungan_keluarga]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Hubungan Keluarga">
                <button type="button" onclick="removeMuzakki(this)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            container.appendChild(newItem);
        }
    } else if (jumlahJiwa < currentItems) {
        const items = container.querySelectorAll('.muzakki-item');
        for (let i = currentItems - 1; i >= jumlahJiwa; i--) {
            items[i].remove();
        }
    }
    muzakkiIndex = jumlahJiwa;
}

function addMuzakki() {
    const container = document.getElementById('muzakki-container');
    const newItem = document.createElement('div');
    newItem.className = 'muzakki-item grid grid-cols-1 md:grid-cols-3 gap-4 mb-2';
    newItem.innerHTML = `
        <input type="text" name="muzakkis[${muzakkiIndex}][nama]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Nama Muzakki">
        <input type="text" name="muzakkis[${muzakkiIndex}][hubungan_keluarga]" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green" placeholder="Hubungan Keluarga">
        <button type="button" onclick="removeMuzakki(this)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(newItem);
    muzakkiIndex++;
}

function removeMuzakki(button) {
    button.closest('.muzakki-item').remove();
}
</script>
@endsection
