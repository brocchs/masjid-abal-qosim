<?php

namespace App\Http\Controllers;

use App\Models\Shodaqoh;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        $donasi = Shodaqoh::with('user')->orderBy('tanggal_shodaqoh', 'desc')->paginate(10);
        return view('donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_shodaqoh' => 'required|numeric|min:0',
            'tanggal_shodaqoh' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        Shodaqoh::create([
            'nama_pemberi' => $request->nama_pemberi,
            'jumlah_shodaqoh' => $request->jumlah_shodaqoh,
            'tanggal_shodaqoh' => $request->tanggal_shodaqoh,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $donasi = Shodaqoh::findOrFail($id);
        return view('donasi.show', compact('donasi'));
    }

    public function edit($id)
    {
        $donasi = Shodaqoh::findOrFail($id);
        return view('donasi.edit', compact('donasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_shodaqoh' => 'required|numeric|min:0',
            'tanggal_shodaqoh' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $donasi = Shodaqoh::findOrFail($id);
        $donasi->update([
            'nama_pemberi' => $request->nama_pemberi,
            'jumlah_shodaqoh' => $request->jumlah_shodaqoh,
            'tanggal_shodaqoh' => $request->tanggal_shodaqoh,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil diupdate');
    }

    public function destroy($id)
    {
        $donasi = Shodaqoh::findOrFail($id);
        $donasi->delete();
        
        return redirect()->route('donasi.index')->with('success', 'Donasi berhasil dihapus');
    }
}