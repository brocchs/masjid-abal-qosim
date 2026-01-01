<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use Illuminate\Http\Request;

class PenerimaBantuanController extends Controller
{
    public function index()
    {
        $penerima = PenerimaBantuan::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('penerima-bantuan.index', compact('penerima'));
    }

    public function create()
    {
        return view('penerima-bantuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penerima_bantuan',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jenis_bantuan' => 'required|in:donasi,wakaf',
            'kategori_penerima' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        PenerimaBantuan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_bantuan' => $request->jenis_bantuan,
            'kategori_penerima' => $request->kategori_penerima,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('penerima-bantuan.index')->with('success', 'Data penerima bantuan berhasil ditambahkan');
    }

    public function show($id)
    {
        $penerima = PenerimaBantuan::with(['penyaluran.sumberDana'])->findOrFail($id);
        return view('penerima-bantuan.show', compact('penerima'));
    }

    public function edit($id)
    {
        $penerima = PenerimaBantuan::findOrFail($id);
        return view('penerima-bantuan.edit', compact('penerima'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:penerima_bantuan,nik,' . $id,
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jenis_bantuan' => 'required|in:donasi,wakaf',
            'kategori_penerima' => 'required|string|max:255',
            'status_verifikasi' => 'required|in:pending,verified,rejected',
            'keterangan' => 'nullable|string'
        ]);

        $penerima = PenerimaBantuan::findOrFail($id);
        $penerima->update($request->all());

        return redirect()->route('penerima-bantuan.index')->with('success', 'Data penerima bantuan berhasil diupdate');
    }

    public function destroy($id)
    {
        $penerima = PenerimaBantuan::findOrFail($id);
        $penerima->delete();
        
        return redirect()->route('penerima-bantuan.index')->with('success', 'Data penerima bantuan berhasil dihapus');
    }
}