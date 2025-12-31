<?php

namespace App\Http\Controllers;

use App\Models\Wakaf;
use Illuminate\Http\Request;

class WakafController extends Controller
{
    public function index()
    {
        $wakaf = Wakaf::with('user')->orderBy('tanggal_wakaf', 'desc')->paginate(10);
        return view('wakaf.index', compact('wakaf'));
    }

    public function create()
    {
        return view('wakaf.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_wakaf' => 'required|numeric|min:0',
            'tanggal_wakaf' => 'required|date',
            'jenis_wakaf' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        Wakaf::create([
            'nama_pemberi' => $request->nama_pemberi,
            'jumlah_wakaf' => $request->jumlah_wakaf,
            'tanggal_wakaf' => $request->tanggal_wakaf,
            'jenis_wakaf' => $request->jenis_wakaf,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('wakaf.index')->with('success', 'Wakaf berhasil ditambahkan');
    }

    public function show($id)
    {
        $wakaf = Wakaf::findOrFail($id);
        return view('wakaf.show', compact('wakaf'));
    }

    public function edit($id)
    {
        $wakaf = Wakaf::findOrFail($id);
        return view('wakaf.edit', compact('wakaf'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_wakaf' => 'required|numeric|min:0',
            'tanggal_wakaf' => 'required|date',
            'jenis_wakaf' => 'required|string',
            'keterangan' => 'nullable|string'
        ]);

        $wakaf = Wakaf::findOrFail($id);
        $wakaf->update([
            'nama_pemberi' => $request->nama_pemberi,
            'jumlah_wakaf' => $request->jumlah_wakaf,
            'tanggal_wakaf' => $request->tanggal_wakaf,
            'jenis_wakaf' => $request->jenis_wakaf,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('wakaf.index')->with('success', 'Wakaf berhasil diupdate');
    }

    public function destroy($id)
    {
        $wakaf = Wakaf::findOrFail($id);
        $wakaf->delete();
        
        return redirect()->route('wakaf.index')->with('success', 'Wakaf berhasil dihapus');
    }
}