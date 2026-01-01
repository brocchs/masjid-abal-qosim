@extends('layouts.app')

@section('title', 'Tambah Penyaluran')
@section('page-title', 'Tambah Penyaluran')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Form Tambah Penyaluran</h2>
        <p class="text-sm text-gray-600">Catat distribusi dana kepada penerima bantuan</p>
    </div>

    <form method="POST" action="{{ route('penyaluran.store') }}" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Penerima Bantuan</label>
                <select name="penerima_id" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                    <option value="">Pilih Penerima</option>
                    @foreach($penerima as $item)
                        <option value="{{ $item->id }}" {{ old('penerima_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }} - {{ $item->kategori_penerima }}
                        </option>
                    @endforeach
                </select>
                @error('penerima_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Penyaluran</label>
                <input type="date" name="tanggal_penyaluran" value="{{ old('tanggal_penyaluran', date('Y-m-d')) }}" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('tanggal_penyaluran')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sumber Dana</label>
                <select name="sumber_dana_type" id="sumberDanaType"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                    <option value="">Pilih Sumber Dana</option>
                    <option value="App\Models\Shodaqoh" {{ old('sumber_dana_type') == 'App\Models\Shodaqoh' ? 'selected' : '' }}>Donasi</option>
                    <option value="App\Models\Wakaf" {{ old('sumber_dana_type') == 'App\Models\Wakaf' ? 'selected' : '' }}>Wakaf</option>
                </select>
                @error('sumber_dana_type')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Detail Sumber Dana</label>
                <select name="sumber_dana_id" id="sumberDanaId"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required disabled>
                    <option value="">Pilih sumber dana terlebih dahulu</option>
                </select>
                @error('sumber_dana_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nominal</label>
                <input type="number" name="nominal" value="{{ old('nominal') }}" step="0.01" min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent" 
                    required>
                @error('nominal')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="3" 
                    placeholder="Keterangan penyaluran (opsional)"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-masjid-green focus:border-transparent">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('penyaluran.index') }}" 
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition-colors">
                Batal
            </a>
            <button type="submit" 
                class="bg-masjid-green hover:bg-masjid-green-dark text-white px-6 py-2 rounded-lg transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('sumberDanaType').addEventListener('change', function() {
    const sumberDanaId = document.getElementById('sumberDanaId');
    const selectedType = this.value;
    
    sumberDanaId.innerHTML = '<option value="">Loading...</option>';
    sumberDanaId.disabled = true;
    
    if (selectedType) {
        let dataSource = [];
        
        if (selectedType === 'App\\Models\\Shodaqoh') {
            dataSource = @json($donasi);
            sumberDanaId.innerHTML = '<option value="">Pilih Donasi</option>';
            dataSource.forEach(item => {
                sumberDanaId.innerHTML += `<option value="${item.id}">${item.nama_pemberi} - Rp ${new Intl.NumberFormat('id-ID').format(item.jumlah_shodaqoh)}</option>`;
            });
        } else if (selectedType === 'App\\Models\\Wakaf') {
            dataSource = @json($wakaf);
            sumberDanaId.innerHTML = '<option value="">Pilih Wakaf</option>';
            dataSource.forEach(item => {
                sumberDanaId.innerHTML += `<option value="${item.id}">${item.nama_pemberi} - Rp ${new Intl.NumberFormat('id-ID').format(item.jumlah_wakaf)}</option>`;
            });
        }
        
        sumberDanaId.disabled = false;
    } else {
        sumberDanaId.innerHTML = '<option value="">Pilih sumber dana terlebih dahulu</option>';
    }
});
</script>
@endsection