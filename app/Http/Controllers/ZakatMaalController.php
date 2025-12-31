<?php

namespace App\Http\Controllers;

use App\Models\ZakatMaal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakatMaalController extends Controller
{
    public function index()
    {
        $zakatMaals = ZakatMaal::orderBy('tanggal_bayar', 'desc')->paginate(10);
        $totalZakat = ZakatMaal::sum('zakat_dibayar');
        
        return view('zakat-maal.index', compact('zakatMaals', 'totalZakat'));
    }

    public function create()
    {
        return view('zakat-maal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'jumlah_harta' => 'required|numeric|min:0',
            'zakat_dibayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->only(['nama_pembayar', 'jumlah_harta', 'zakat_dibayar', 'tanggal_bayar', 'keterangan']);
        $data['user_id'] = Auth::id();

        ZakatMaal::create($data);

        return redirect()->route('zakat-maal.index')->with('success', 'Data zakat maal berhasil ditambahkan');
    }

    public function edit(ZakatMaal $zakatMaal)
    {
        return view('zakat-maal.edit', compact('zakatMaal'));
    }

    public function update(Request $request, ZakatMaal $zakatMaal)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'jumlah_harta' => 'required|numeric|min:0',
            'zakat_dibayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->only(['nama_pembayar', 'jumlah_harta', 'zakat_dibayar', 'tanggal_bayar', 'keterangan']);
        $zakatMaal->update($data);

        return redirect()->route('zakat-maal.index')->with('success', 'Data zakat maal berhasil diperbarui');
    }

    public function destroy(ZakatMaal $zakatMaal)
    {
        $zakatMaal->delete();
        return redirect()->route('zakat-maal.index')->with('success', 'Data zakat maal berhasil dihapus');
    }
}