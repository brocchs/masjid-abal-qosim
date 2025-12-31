@extends('layouts.app')

@section('title', 'Detail Cash Flow - Masjid Abal Qosim')
@section('page-title', 'Detail Cash Flow')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-2xl">
        <div class="bg-white rounded-lg shadow">
            <div class="bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg">
                <h5 class="text-lg font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-eye mr-2"></i>
                    Detail Cash Flow
                </h5>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Cash Flow</label>
                        <div>
                            <span class="inline-block px-3 py-1 text-sm font-semibold rounded {{ $cashflow->type == 'credit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $cashflow->type == 'credit' ? 'Pemasukan' : 'Pengeluaran' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jumlah</label>
                        <div class="text-2xl font-bold {{ $cashflow->type == 'credit' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $cashflow->type == 'credit' ? '+' : '-' }} Rp {{ number_format($cashflow->amount, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
                    <div class="p-3 bg-gray-50 rounded">
                        {{ $cashflow->description }}
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Cash Flow</label>
                        <div class="text-gray-700">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $cashflow->transaction_date->format('d F Y') }}
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Invoice</label>
                        <div>
                            @if($cashflow->invoice_file)
                                <a href="{{ Storage::url($cashflow->invoice_file) }}" target="_blank" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded inline-block">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    Lihat Invoice
                                </a>
                            @else
                                <span class="text-gray-500">
                                    <i class="fas fa-times mr-2"></i>
                                    Tidak ada invoice
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Dibuat</label>
                        <div class="text-gray-500">
                            <i class="fas fa-clock mr-2"></i>
                            {{ $cashflow->created_at->format('d F Y H:i') }}
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Terakhir Diupdate</label>
                        <div class="text-gray-500">
                            <i class="fas fa-edit mr-2"></i>
                            {{ $cashflow->updated_at->format('d F Y H:i') }}
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <a href="{{ route('cash-flow.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <div class="space-x-2">
                        <a href="{{ route('cash-flow.edit', encrypt($cashflow->id)) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-edit mr-2"></i>
                            Edit
                        </a>
                        <form action="{{ route('cash-flow.destroy', encrypt($cashflow->id)) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus cash flow ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                <i class="fas fa-trash mr-2"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection