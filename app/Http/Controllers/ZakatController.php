<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakatController extends Controller
{
    public function index()
    {
        $zakats = Zakat::orderBy('tanggal_bayar', 'desc')->paginate(10);
        $totalZakat = Zakat::sum('total_bayar');
        $totalJiwa = Zakat::sum('jumlah_jiwa');
        
        return view('zakat.index', compact('zakats', 'totalZakat', 'totalJiwa'));
    }

    public function create()
    {
        return view('zakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'jumlah_jiwa' => 'required|integer|min:1',
            'harga_per_jiwa' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date'
        ]);

        $data = $request->only(['nama_pembayar', 'jumlah_jiwa', 'harga_per_jiwa', 'tanggal_bayar']);
        $data['total_bayar'] = $request->jumlah_jiwa * $request->harga_per_jiwa;
        $data['user_id'] = Auth::id();

        Zakat::create($data);

        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil ditambahkan');
    }

    public function edit(Zakat $zakat)
    {
        return view('zakat.edit', compact('zakat'));
    }

    public function update(Request $request, Zakat $zakat)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'jumlah_jiwa' => 'required|integer|min:1',
            'harga_per_jiwa' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date'
        ]);

        $data = $request->only(['nama_pembayar', 'jumlah_jiwa', 'harga_per_jiwa', 'tanggal_bayar']);
        $data['total_bayar'] = $request->jumlah_jiwa * $request->harga_per_jiwa;

        $zakat->update($data);

        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil diperbarui');
    }

    public function destroy(Zakat $zakat)
    {
        $zakat->delete();
        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil dihapus');
    }
}