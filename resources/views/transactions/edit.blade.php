@extends('layouts.app')

@section('title', 'Edit Cash Flow - Masjid Abal Qosim')
@section('page-title', 'Edit Cash Flow')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Cash Flow
                </h5>
            </div>
            <div class="p-6">
                <form action="{{ route('transactions.update', $transaction) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Jenis Cash Flow</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('type') border-red-500 @enderror" id="type" name="type" required>
                                <option value="">Pilih Jenis</option>
                                <option value="credit" {{ old('type', $transaction->type) == 'credit' ? 'selected' : '' }}>Pemasukan</option>
                                <option value="debit" {{ old('type', $transaction->type) == 'debit' ? 'selected' : '' }}>Pengeluaran</option>
                            </select>
                            @error('type')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Jumlah (Rp)</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('amount') border-red-500 @enderror" 
                                   id="amount_display" placeholder="0" 
                                   oninput="formatCurrency(this)">
                            <input type="hidden" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}" required>
                            @error('amount')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('description') border-red-500 @enderror" 
                                  id="description" name="description" rows="3" 
                                  placeholder="Masukkan deskripsi cash flow..." required>{{ old('description', $transaction->description) }}</textarea>
                        @error('description')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="transaction_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Cash Flow</label>
                            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('transaction_date') border-red-500 @enderror" 
                                   id="transaction_date" name="transaction_date" 
                                   value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}" required>
                            @error('transaction_date')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="invoice_file" class="block text-sm font-medium text-gray-700 mb-2">Upload Invoice (Opsional)</label>
                            @if($transaction->invoice_file)
                                <div class="mb-2">
                                    <small class="text-gray-500">File saat ini: </small>
                                    <a href="{{ Storage::url($transaction->invoice_file) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-file-alt"></i> Lihat Invoice
                                    </a>
                                </div>
                            @endif
                            <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green @error('invoice_file') border-red-500 @enderror" 
                                   id="invoice_file" name="invoice_file" 
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <div class="text-gray-500 text-sm mt-1">Format: PDF, JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah.</div>
                            @error('invoice_file')
                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('transactions.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                            <i class="fas fa-save mr-2"></i>
                            Update Cash Flow
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
function formatCurrency(input) {
    let value = input.value.replace(/[^\d]/g, '');
    let formatted = new Intl.NumberFormat('id-ID').format(value);
    input.value = formatted;
    document.getElementById('amount').value = value;
}

// Set initial value for editing
window.onload = function() {
    let initialValue = '{{ old('amount', $transaction->amount) }}';
    if (initialValue) {
        document.getElementById('amount_display').value = new Intl.NumberFormat('id-ID').format(initialValue);
    }
}
</script>
@endsection