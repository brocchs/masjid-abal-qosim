<?php

namespace App\Http\Controllers;

use App\Models\Shodaqoh;
use App\Models\Wakaf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonaturReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $type = $request->get('type', 'all'); // all, donasi, wakaf
        $search = $request->get('search');

        // Query donasi (shodaqoh)
        $donasiQuery = Shodaqoh::select(
            'nama_pemberi',
            DB::raw('SUM(jumlah_shodaqoh) as total_amount'),
            DB::raw('COUNT(*) as total_transactions'),
            DB::raw('"Donasi" as type')
        )->groupBy('nama_pemberi');

        // Query wakaf
        $wakafQuery = Wakaf::select(
            'nama_pemberi',
            DB::raw('SUM(jumlah_wakaf) as total_amount'),
            DB::raw('COUNT(*) as total_transactions'),
            DB::raw('"Wakaf" as type')
        )->groupBy('nama_pemberi');

        // Filter berdasarkan tanggal
        if ($startDate) {
            $donasiQuery->where('tanggal_shodaqoh', '>=', $startDate);
            $wakafQuery->where('tanggal_wakaf', '>=', $startDate);
        }
        if ($endDate) {
            $donasiQuery->where('tanggal_shodaqoh', '<=', $endDate);
            $wakafQuery->where('tanggal_wakaf', '<=', $endDate);
        }

        // Filter berdasarkan nama
        if ($search) {
            $donasiQuery->where('nama_pemberi', 'LIKE', '%' . $search . '%');
            $wakafQuery->where('nama_pemberi', 'LIKE', '%' . $search . '%');
        }

        // Gabungkan query berdasarkan tipe
        if ($type === 'donasi') {
            $donatur = $donasiQuery->get();
        } elseif ($type === 'wakaf') {
            $donatur = $wakafQuery->get();
        } else {
            // Gabungkan donasi dan wakaf per donatur
            $donasi = $donasiQuery->get();
            $wakaf = $wakafQuery->get();
            
            $allDonatur = collect();
            $allNames = $donasi->pluck('nama_pemberi')->merge($wakaf->pluck('nama_pemberi'))->unique();
            
            // Gabungkan data per donatur
            foreach ($allNames as $nama) {
                $donasiData = $donasi->where('nama_pemberi', $nama)->first();
                $wakafData = $wakaf->where('nama_pemberi', $nama)->first();
                
                $totalAmount = 0;
                $totalTransactions = 0;
                $types = [];
                
                if ($donasiData) {
                    $totalAmount += $donasiData->total_amount;
                    $totalTransactions += $donasiData->total_transactions;
                    $types[] = 'Donasi';
                }
                
                if ($wakafData) {
                    $totalAmount += $wakafData->total_amount;
                    $totalTransactions += $wakafData->total_transactions;
                    $types[] = 'Wakaf';
                }
                
                $allDonatur->push((object)[
                    'nama_pemberi' => $nama,
                    'total_amount' => $totalAmount,
                    'total_transactions' => $totalTransactions,
                    'type' => implode(', ', $types)
                ]);
            }
            
            $donatur = $allDonatur->sortByDesc('total_amount');
        }

        // Statistik
        $totalDonatur = $donatur->count();
        $totalAmount = $donatur->sum('total_amount');
        $totalTransactions = $donatur->sum('total_transactions');

        return view('reports.donatur', compact(
            'donatur', 
            'totalDonatur', 
            'totalAmount', 
            'totalTransactions',
            'startDate',
            'endDate',
            'type',
            'search'
        ));
    }

    public function detail($nama, Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        // Ambil data donasi
        $donasiQuery = Shodaqoh::where('nama_pemberi', $nama);
        if ($startDate) $donasiQuery->where('tanggal_shodaqoh', '>=', $startDate);
        if ($endDate) $donasiQuery->where('tanggal_shodaqoh', '<=', $endDate);
        $donasi = $donasiQuery->orderBy('tanggal_shodaqoh', 'desc')->get();

        // Ambil data wakaf
        $wakafQuery = Wakaf::where('nama_pemberi', $nama);
        if ($startDate) $wakafQuery->where('tanggal_wakaf', '>=', $startDate);
        if ($endDate) $wakafQuery->where('tanggal_wakaf', '<=', $endDate);
        $wakaf = $wakafQuery->orderBy('tanggal_wakaf', 'desc')->get();

        $totalDonasi = $donasi->sum('jumlah_shodaqoh');
        $totalWakaf = $wakaf->sum('jumlah_wakaf');

        return view('reports.donatur-detail', compact(
            'nama', 
            'donasi', 
            'wakaf', 
            'totalDonasi', 
            'totalWakaf',
            'startDate',
            'endDate'
        ));
    }
}