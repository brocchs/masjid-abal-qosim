<?php

namespace App\Http\Controllers;

use App\Models\Shodaqoh;
use App\Models\Wakaf;
use App\Models\CashFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PublicController extends Controller
{
    public function index()
    {
        $currentMonth = date('Y-m');
        $monthName = \Carbon\Carbon::parse($currentMonth)->format('F Y');
        
        // Data bulan ini
        $startDate = \Carbon\Carbon::parse($currentMonth . '-01')->startOfMonth();
        $endDate = \Carbon\Carbon::parse($currentMonth . '-01')->endOfMonth();
        
        $totalDonasi = Shodaqoh::whereBetween('tanggal_shodaqoh', [$startDate, $endDate])->sum('jumlah_shodaqoh');
        $totalWakaf = Wakaf::whereBetween('tanggal_wakaf', [$startDate, $endDate])->sum('jumlah_wakaf');
        $totalPemasukan = CashFlow::where('type', 'credit')->whereBetween('transaction_date', [$startDate, $endDate])->sum('amount');
        $totalPengeluaran = CashFlow::where('type', 'debit')->whereBetween('transaction_date', [$startDate, $endDate])->sum('amount');
        $totalSaldo = CashFlow::where('type', 'credit')->sum('amount') - CashFlow::where('type', 'debit')->sum('amount');
        
        // Data bulan lalu untuk perbandingan
        $lastMonth = \Carbon\Carbon::parse($currentMonth . '-01')->subMonth();
        $lastStartDate = $lastMonth->copy()->startOfMonth();
        $lastEndDate = $lastMonth->copy()->endOfMonth();
        
        $lastDonasi = Shodaqoh::whereBetween('tanggal_shodaqoh', [$lastStartDate, $lastEndDate])->sum('jumlah_shodaqoh');
        $lastWakaf = Wakaf::whereBetween('tanggal_wakaf', [$lastStartDate, $lastEndDate])->sum('jumlah_wakaf');
        $lastPemasukan = CashFlow::where('type', 'credit')->whereBetween('transaction_date', [$lastStartDate, $lastEndDate])->sum('amount');
        $lastPengeluaran = CashFlow::where('type', 'debit')->whereBetween('transaction_date', [$lastStartDate, $lastEndDate])->sum('amount');
        
        // Hitung persentase perubahan
        $donasiPercent = $lastDonasi > 0 ? round((($totalDonasi - $lastDonasi) / $lastDonasi) * 100) : 0;
        $wakafPercent = $lastWakaf > 0 ? round((($totalWakaf - $lastWakaf) / $lastWakaf) * 100) : 0;
        $pemasukanPercent = $lastPemasukan > 0 ? round((($totalPemasukan - $lastPemasukan) / $lastPemasukan) * 100) : 0;
        $pengeluaranPercent = $lastPengeluaran > 0 ? round((($totalPengeluaran - $lastPengeluaran) / $lastPengeluaran) * 100) : 0;
        
        $donasiTerbaru = Shodaqoh::orderBy('tanggal_shodaqoh', 'desc')->take(5)->get();
        $wakafTerbaru = Wakaf::orderBy('tanggal_wakaf', 'desc')->take(5)->get();
        
        // Get event images
        $eventPath = public_path('pictures/event');
        $eventImages = [];
        if (File::exists($eventPath)) {
            $files = File::files($eventPath);
            foreach ($files as $file) {
                if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                    $eventImages[] = 'pictures/event/' . $file->getFilename();
                }
            }
        }

        return view('public.landing', compact(
            'totalDonasi', 
            'totalWakaf', 
            'totalPemasukan', 
            'totalPengeluaran',
            'totalSaldo',
            'donasiPercent',
            'wakafPercent',
            'pemasukanPercent',
            'pengeluaranPercent',
            'donasiTerbaru',
            'wakafTerbaru',
            'eventImages',
            'monthName'
        ));
    }

    public function getPemasukanDetail()
    {
        $currentMonth = date('Y-m');
        $startDate = \Carbon\Carbon::parse($currentMonth . '-01')->startOfMonth();
        $endDate = \Carbon\Carbon::parse($currentMonth . '-01')->endOfMonth();
        
        $pemasukan = CashFlow::where('type', 'credit')
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->get()
            ->map(function($item) {
                return [
                    'tanggal' => \Carbon\Carbon::parse($item->transaction_date)->format('d/m/Y'),
                    'keterangan' => $item->description,
                    'jumlah' => 'Rp ' . number_format($item->amount, 0, ',', '.')
                ];
            });
        
        return response()->json($pemasukan);
    }

    public function getPengeluaranDetail()
    {
        $currentMonth = date('Y-m');
        $startDate = \Carbon\Carbon::parse($currentMonth . '-01')->startOfMonth();
        $endDate = \Carbon\Carbon::parse($currentMonth . '-01')->endOfMonth();
        
        $pengeluaran = CashFlow::where('type', 'debit')
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->orderBy('transaction_date', 'desc')
            ->get()
            ->map(function($item) {
                return [
                    'tanggal' => \Carbon\Carbon::parse($item->transaction_date)->format('d/m/Y'),
                    'keterangan' => $item->description,
                    'jumlah' => 'Rp ' . number_format($item->amount, 0, ',', '.')
                ];
            });
        
        return response()->json($pengeluaran);
    }
}