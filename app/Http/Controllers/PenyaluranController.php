<?php

namespace App\Http\Controllers;

use App\Models\Penyaluran;
use App\Models\PenerimaBantuan;
use App\Models\Shodaqoh;
use App\Models\Wakaf;
use Illuminate\Http\Request;

class PenyaluranController extends Controller
{
    public function index()
    {
        $penyaluran = Penyaluran::with(['penerima', 'user'])->orderBy('tanggal_penyaluran', 'desc')->paginate(10);
        return view('penyaluran.index', compact('penyaluran'));
    }

    public function create()
    {
        $penerima = PenerimaBantuan::where('status_verifikasi', 'verified')->get();
        $donasi = Shodaqoh::all();
        $wakaf = Wakaf::all();
        return view('penyaluran.create', compact('penerima', 'donasi', 'wakaf'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima_bantuan,id',
            'sumber_dana_type' => 'required|string',
            'sumber_dana_id' => 'required|integer',
            'nominal' => 'required|numeric|min:0',
            'tanggal_penyaluran' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        Penyaluran::create([
            'penerima_id' => $request->penerima_id,
            'sumber_dana_type' => $request->sumber_dana_type,
            'sumber_dana_id' => $request->sumber_dana_id,
            'nominal' => $request->nominal,
            'tanggal_penyaluran' => $request->tanggal_penyaluran,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('penyaluran.index')->with('success', 'Data penyaluran berhasil ditambahkan');
    }

    public function show($id)
    {
        $penyaluran = Penyaluran::with(['penerima', 'sumberDana'])->findOrFail($id);
        return view('penyaluran.show', compact('penyaluran'));
    }

    public function edit($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);
        $penerima = PenerimaBantuan::where('status_verifikasi', 'verified')->get();
        $donasi = Shodaqoh::all();
        $wakaf = Wakaf::all();
        return view('penyaluran.edit', compact('penyaluran', 'penerima', 'donasi', 'wakaf'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penerima_id' => 'required|exists:penerima_bantuan,id',
            'sumber_dana_type' => 'required|string',
            'sumber_dana_id' => 'required|integer',
            'nominal' => 'required|numeric|min:0',
            'tanggal_penyaluran' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $penyaluran = Penyaluran::findOrFail($id);
        $penyaluran->update($request->all());

        return redirect()->route('penyaluran.index')->with('success', 'Data penyaluran berhasil diupdate');
    }

    public function destroy($id)
    {
        $penyaluran = Penyaluran::findOrFail($id);
        $penyaluran->delete();
        
        return redirect()->route('penyaluran.index')->with('success', 'Data penyaluran berhasil dihapus');
    }
}