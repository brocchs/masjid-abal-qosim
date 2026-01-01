<?php

namespace App\Http\Controllers;

use App\Models\Penyaluran;
use App\Models\PenerimaBantuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyaluranReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Penyaluran::with(['penerima', 'user']);
        
        if ($request->filled('jenis_bantuan')) {
            $query->whereHas('penerima', function($q) use ($request) {
                $q->where('jenis_bantuan', $request->jenis_bantuan);
            });
        }
        
        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_penyaluran', $request->bulan);
        }
        
        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_penyaluran', $request->tahun);
        }

        $penyaluran = $query->orderBy('tanggal_penyaluran', 'desc')->paginate(15);
        
        $statistik = [
            'total_penyaluran' => $query->sum('nominal'),
            'jumlah_penerima' => $query->distinct('penerima_id')->count(),
            'per_jenis' => PenerimaBantuan::select('jenis_bantuan', DB::raw('count(*) as jumlah'))
                ->groupBy('jenis_bantuan')->get()
        ];

        return view('reports.penyaluran', compact('penyaluran', 'statistik'));
    }
}