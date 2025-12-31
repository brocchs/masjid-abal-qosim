<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('transaction_date', 'desc')->paginate(10);
        $totalDebit = Transaction::where('type', 'debit')->sum('amount');
        $totalCredit = Transaction::where('type', 'credit')->sum('amount');
        $balance = $totalCredit - $totalDebit;
        
        return view('transactions.index', compact('transactions', 'totalDebit', 'totalCredit', 'balance'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'invoice_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['type', 'amount', 'description', 'transaction_date']);
        $data['user_id'] = Auth::id();

        if ($request->hasFile('invoice_file')) {
            $file = $request->file('invoice_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['invoice_file'] = $file->storeAs('invoices', $filename, 'public');
        }

        Transaction::create($data);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'invoice_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['type', 'amount', 'description', 'transaction_date']);

        if ($request->hasFile('invoice_file')) {
            if ($transaction->invoice_file) {
                Storage::disk('public')->delete($transaction->invoice_file);
            }
            $file = $request->file('invoice_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['invoice_file'] = $file->storeAs('invoices', $filename, 'public');
        }

        $transaction->update($data);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaction $transaction)
    {
        if ($transaction->invoice_file) {
            Storage::disk('public')->delete($transaction->invoice_file);
        }
        
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus');
    }
}