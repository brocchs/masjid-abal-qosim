<?php

namespace App\Http\Controllers;

use App\Models\CashFlow;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CashFlowReportController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->get('month', date('Y-m'));
        $startDate = Carbon::parse($month . '-01')->startOfMonth();
        $endDate = Carbon::parse($month . '-01')->endOfMonth();

        $cashflows = CashFlow::whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->get();

        $totalCredit = $cashflows->where('type', 'credit')->sum('amount');
        $totalDebit = $cashflows->where('type', 'debit')->sum('amount');
        $balance = $totalCredit - $totalDebit;

        // Saldo keseluruhan (tanpa periode)
        $allCredit = CashFlow::where('type', 'credit')->sum('amount');
        $allDebit = CashFlow::where('type', 'debit')->sum('amount');
        $totalBalance = $allCredit - $allDebit;

        return view('cashflow-reports.index', compact('cashflows', 'totalCredit', 'totalDebit', 'balance', 'month', 'totalBalance'));
    }
}