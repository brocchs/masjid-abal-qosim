<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use App\Imports\CashFlowImport;
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
            $file->move(public_path('invoices'), $filename);
            $data['invoice_file'] = 'invoices/' . $filename;
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
                $oldFile = public_path($cashflow->invoice_file);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $file = $request->file('invoice_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('invoices'), $filename);
            $data['invoice_file'] = 'invoices/' . $filename;
        }

        $cashflow->update($data);

        return redirect()->route('cash-flow.index')->with('success', 'Cash Flow berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cashflow = CashFlow::findOrFail(decrypt($id));
        
        if ($cashflow->invoice_file) {
            $filePath = public_path($cashflow->invoice_file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
        $cashflow->delete();

        return redirect()->route('cash-flow.index')->with('success', 'Cash Flow berhasil dihapus');
    }

    public function importForm()
    {
        return view('cashflows.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls|max:2048'
        ]);

        $file = $request->file('file');
        $path = $file->getRealPath();

        $import = new CashFlowImport(Auth::id());
        $import->import($path);

        $errors = $import->getErrors();
        $successCount = $import->getSuccessCount();

        if (count($errors) > 0) {
            return redirect()->route('cash-flow.import.form')
                ->with('errors_detail', $errors)
                ->with('success_count', $successCount)
                ->with('error', 'Import selesai dengan ' . count($errors) . ' error dan ' . $successCount . ' data berhasil.');
        }

        return redirect()->route('cash-flow.index')
            ->with('success', 'Berhasil import ' . $successCount . ' data cash flow');
    }

    public function downloadTemplate()
    {
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'tanggal');
        $sheet->setCellValue('B1', 'jenis');
        $sheet->setCellValue('C1', 'jumlah');
        $sheet->setCellValue('D1', 'deskripsi');
        
        $sheet->setCellValue('A2', '01/01/2024');
        $sheet->setCellValue('B2', 'Pemasukan');
        $sheet->setCellValue('C2', '500000');
        $sheet->setCellValue('D2', 'Donasi Jamaah');
        
        $sheet->setCellValue('A3', '02/01/2024');
        $sheet->setCellValue('B3', 'Pengeluaran');
        $sheet->setCellValue('C3', '200000');
        $sheet->setCellValue('D3', 'Listrik Bulan Januari');
        
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="template_cashflow.xlsx"');
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit;
    }
}