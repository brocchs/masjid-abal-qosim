<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class ZakatReportController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $type = $request->get('type', 'all');

        $query = Zakat::query();

        if ($startDate) {
            $query->where('tanggal_bayar', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('tanggal_bayar', '<=', $endDate);
        }
        if ($type !== 'all') {
            $query->where('jenis_zakat', $type);
        }

        $data = $query->orderBy('tanggal_bayar', 'desc')->get();

        $zakat = $data->where('jenis_zakat', 'fitrah');
        $zakatMaal = $data->where('jenis_zakat', 'maal');
        $shodaqoh = $data->where('jenis_zakat', 'shodaqoh');

        // Load muzakkis relationship
        $data->load('muzakkis');

        $totalZakat = $zakat->sum('total_bayar');
        $totalZakatMaal = $zakatMaal->sum('total_bayar');
        $totalShodaqoh = $shodaqoh->sum('total_bayar');
        $grandTotal = $totalZakat + $totalZakatMaal + $totalShodaqoh;

        return view('reports.zakat', compact(
            'zakat',
            'zakatMaal',
            'shodaqoh',
            'totalZakat',
            'totalZakatMaal',
            'totalShodaqoh',
            'grandTotal',
            'startDate',
            'endDate',
            'type'
        ));
    }
}
