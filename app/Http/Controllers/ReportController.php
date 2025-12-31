<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function monthly(Request $request)
    {
        $month = $request->get('month', date('Y-m'));
        $startDate = Carbon::parse($month . '-01')->startOfMonth();
        $endDate = Carbon::parse($month . '-01')->endOfMonth();

        $transactions = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->paginate(10);

        $totalCredit = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('type', 'credit')->sum('amount');
        $totalDebit = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('type', 'debit')->sum('amount');
        $balance = $totalCredit - $totalDebit;

        return view('reports.monthly', compact('transactions', 'totalCredit', 'totalDebit', 'balance', 'month'));
    }
}