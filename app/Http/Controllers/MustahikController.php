<?php

namespace App\Http\Controllers;

use App\Models\Mustahik;
use Illuminate\Http\Request;

class MustahikController extends Controller
{
    public function index()
    {
        $mustahiks = Mustahik::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('mustahik.index', compact('mustahiks'));
    }

    public function create()
    {
        return view('mustahik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'kategori' => 'required|in:fakir,miskin,amil,mualaf,riqab,gharim,fisabilillah,ibnu_sabil',
            'keterangan' => 'nullable|string'
        ]);

        Mustahik::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('mustahik.index')->with('success', 'Data mustahik berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        return view('mustahik.edit', compact('mustahik'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:20',
            'kategori' => 'required|in:fakir,miskin,amil,mualaf,riqab,gharim,fisabilillah,ibnu_sabil',
            'keterangan' => 'nullable|string'
        ]);

        $mustahik = Mustahik::findOrFail($id);
        $mustahik->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('mustahik.index')->with('success', 'Data mustahik berhasil diupdate');
    }

    public function destroy($id)
    {
        $mustahik = Mustahik::findOrFail($id);
        $mustahik->delete();
        
        return redirect()->route('mustahik.index')->with('success', 'Data mustahik berhasil dihapus');
    }
}
