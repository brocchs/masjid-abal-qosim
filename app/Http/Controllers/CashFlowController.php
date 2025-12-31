<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CashFlowController extends Controller
{
    public function index()
    {
        $cashflows = CashFlow::orderBy('transaction_date', 'desc')->paginate(10);
        $totalDebit = CashFlow::where('type', 'debit')->sum('amount');
        $totalCredit = CashFlow::where('type', 'credit')->sum('amount');
        $balance = $totalCredit - $totalDebit;
        
        return view('cashflows.index', compact('cashflows', 'totalDebit', 'totalCredit', 'balance'));
    }

    public function create()
    {
        return view('cashflows.create');
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

        CashFlow::create($data);

        return redirect()->route('cash-flow.index')->with('success', 'Cash Flow berhasil ditambahkan');
    }

    public function show($id)
    {
        $cashflow = CashFlow::findOrFail(decrypt($id));
        return view('cashflows.show', compact('cashflow'));
    }

    public function edit($id)
    {
        $cashflow = CashFlow::findOrFail(decrypt($id));
        return view('cashflows.edit', compact('cashflow'));
    }

    public function update(Request $request, $id)
    {
        $cashflow = CashFlow::findOrFail(decrypt($id));
        
        $request->validate([
            'type' => 'required|in:debit,credit',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'transaction_date' => 'required|date',
            'invoice_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['type', 'amount', 'description', 'transaction_date']);

        if ($request->hasFile('invoice_file')) {
            if ($cashflow->invoice_file) {
                Storage::disk('public')->delete($cashflow->invoice_file);
            }
            $file = $request->file('invoice_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['invoice_file'] = $file->storeAs('invoices', $filename, 'public');
        }

        $cashflow->update($data);

        return redirect()->route('cash-flow.index')->with('success', 'Cash Flow berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cashflow = CashFlow::findOrFail(decrypt($id));
        
        if ($cashflow->invoice_file) {
            Storage::disk('public')->delete($cashflow->invoice_file);
        }
        
        $cashflow->delete();

        return redirect()->route('cash-flow.index')->with('success', 'Cash Flow berhasil dihapus');
    }
}