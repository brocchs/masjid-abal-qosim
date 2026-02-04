<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisReportController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'all');
        $kondisi = $request->get('kondisi', 'all');

        $query = Inventaris::with('user');

        if ($kategori !== 'all') {
            $query->where('kategori', $kategori);
        }
        if ($kondisi !== 'all') {
            $query->where('kondisi', $kondisi);
        }

        $inventaris = $query->orderBy('nama_barang', 'asc')->get();
        
        $totalBarang = $inventaris->sum('jumlah');
        $totalNilai = $inventaris->sum('harga_perolehan');
        $barangBaik = $inventaris->where('kondisi', 'baik')->sum('jumlah');
        $barangRusakRingan = $inventaris->where('kondisi', 'rusak_ringan')->sum('jumlah');
        $barangRusakBerat = $inventaris->where('kondisi', 'rusak_berat')->sum('jumlah');

        return view('inventaris-reports.index', compact(
            'inventaris',
            'totalBarang',
            'totalNilai',
            'barangBaik',
            'barangRusakRingan',
            'barangRusakBerat',
            'kategori',
            'kondisi'
        ));
    }
}
