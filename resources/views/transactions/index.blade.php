@extends('layouts.app')

@section('title', 'Cash Flow - Masjid Abal Qosim')
@section('page-title', 'Cash Flow')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-green-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Pemasukan</h6>
                <h4 class="text-xl font-bold">Rp {{ number_format($totalCredit, 0, ',', '.') }}</h4>
            </div>
            <i class="fas fa-arrow-up text-2xl"></i>
        </div>
    </div>
    <div class="bg-red-500 text-white rounded-lg shadow p-4">
        <div class="flex justify-between items-center">
            <div>
                <h6 class="text-sm font-medium">Total Pengeluaran</h6>
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
    <div class="bg-white border-2 border-green-500 rounded-lg shadow p-4">
        <div class="text-center">
            <a href="{{ route('transactions.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded w-full inline-block">
                <i class="fas fa-plus-circle mr-2"></i>
                Tambah Cash Flow
            </a>
        </div>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
        <h5 class="text-lg font-semibold text-gray-800 flex items-center">
            <i class="fas fa-list mr-2"></i>
            Daftar Cash Flow
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
                            <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Invoice</th>
                            <th class="px-4 py-3 text-center text-sm font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($transactions as $transaction)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $transaction->transaction_date->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded {{ $transaction->type == 'credit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $transaction->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $transaction->description }}</td>
                            <td class="px-4 py-3 text-sm {{ $transaction->type == 'credit' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->type == 'credit' ? '+' : '-' }} Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-500">{{ $transaction->user->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-3">
                                @if($transaction->invoice_file)
                                    <a href="{{ Storage::url($transaction->invoice_file) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('transactions.show', $transaction) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transactions.edit', $transaction) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 rounded text-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus cash flow ini?')">
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
                {{ $transactions->links() }}
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada cash flow</p>
                <a href="{{ route('transactions.create') }}" class="bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Cash Flow Pertama
                </a>
            </div>
        @endif
    </div>
</div>
@endsection