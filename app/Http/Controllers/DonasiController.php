<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Zakat::where('jenis_zakat', 'shodaqoh')->with('user')->orderBy('tanggal_bayar', 'desc')->paginate(10);
        return view('donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'total_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        Zakat::create([
            'nama_pembayar' => $request->nama_pembayar,
            'jenis_zakat' => 'shodaqoh',
            'jumlah_jiwa' => 1,
            'jenis_bayar' => 'tunai',
            'total_bayar' => $request->total_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $donasi = Zakat::where('jenis_zakat', 'shodaqoh')->findOrFail($id);
        return view('donasi.show', compact('donasi'));
    }

    public function edit($id)
    {
        $donasi = Zakat::where('jenis_zakat', 'shodaqoh')->findOrFail($id);
        return view('donasi.edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'total_bayar' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $donasi = Zakat::where('jenis_zakat', 'shodaqoh')->findOrFail($id);
        $donasi->update([
            'nama_pembayar' => $request->nama_pembayar,
            'total_bayar' => $request->total_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $donasi = Zakat::where('jenis_zakat', 'shodaqoh')->findOrFail($id);
        $donasi->delete();
        
        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil dihapus');
    }
}