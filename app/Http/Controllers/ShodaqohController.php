<?php

namespace App\Http\Controllers;

use App\Models\Shodaqoh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShodaqohController extends Controller
{
    public function index()
    {
        $shodaqohs = Shodaqoh::orderBy('tanggal_shodaqoh', 'desc')->paginate(10);
        $totalShodaqoh = Shodaqoh::sum('jumlah_shodaqoh');
        
        return view('shodaqoh.index', compact('shodaqohs', 'totalShodaqoh'));
    }

    public function create()
    {
        return view('shodaqoh.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_shodaqoh' => 'required|numeric|min:0',
            'tanggal_shodaqoh' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->only(['nama_pemberi', 'jumlah_shodaqoh', 'tanggal_shodaqoh', 'keterangan']);
        $data['user_id'] = Auth::id();

        Shodaqoh::create($data);

        return redirect()->route('shodaqoh.index')->with('success', 'Data shodaqoh berhasil ditambahkan');
    }

    public function edit(Shodaqoh $shodaqoh)
    {
        return view('shodaqoh.edit', compact('shodaqoh'));
    }

    public function update(Request $request, Shodaqoh $shodaqoh)
    {
        $request->validate([
            'nama_pemberi' => 'required|string|max:255',
            'jumlah_shodaqoh' => 'required|numeric|min:0',
            'tanggal_shodaqoh' => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $data = $request->only(['nama_pemberi', 'jumlah_shodaqoh', 'tanggal_shodaqoh', 'keterangan']);
        $shodaqoh->update($data);

        return redirect()->route('shodaqoh.index')->with('success', 'Data shodaqoh berhasil diperbarui');
    }

    public function destroy(Shodaqoh $shodaqoh)
    {
        $shodaqoh->delete();
        return redirect()->route('shodaqoh.index')->with('success', 'Data shodaqoh berhasil dihapus');
    }
}