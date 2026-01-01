<?php

namespace App\Http\Controllers;

use App\Models\Shodaqoh;
use App\Models\Wakaf;
use App\Models\CashFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index()
    {
        $totalDonasi = Shodaqoh::sum('jumlah_shodaqoh');
        $totalWakaf = Wakaf::sum('jumlah_wakaf');
        $totalPemasukan = CashFlow::where('type', 'credit')->sum('amount');
        $totalPengeluaran = CashFlow::where('type', 'debit')->sum('amount');
        
        $donasiTerbaru = Shodaqoh::orderBy('tanggal_shodaqoh', 'desc')->take(5)->get();
        $wakafTerbaru = Wakaf::orderBy('tanggal_wakaf', 'desc')->take(5)->get();

        return view('public.landing', compact(
            'totalDonasi', 
            'totalWakaf', 
            'totalPemasukan', 
            'totalPengeluaran',
            'donasiTerbaru',
            'wakafTerbaru'
        ));
    }
}