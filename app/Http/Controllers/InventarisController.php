<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventaris::with('user');
        
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', '%' . $search . '%')
                  ->orWhere('kode_barang', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }
        
        $inventaris = $query->orderBy('created_at', 'desc')->paginate(10)->appends(['search' => $request->search]);
        $totalBarang = Inventaris::sum('jumlah');
        $totalNilai = Inventaris::sum('harga_perolehan');
        return view('inventaris.index', compact('inventaris', 'totalBarang', 'totalNilai'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|unique:inventaris',
            'kategori' => 'required|in:elektronik,furniture,alat_ibadah,alat_kebersihan,lainnya',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat',
            'tanggal_perolehan' => 'required|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'kondisi' => $request->kondisi,
            'tanggal_perolehan' => $request->tanggal_perolehan,
            'harga_perolehan' => $request->harga_perolehan,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'required|string|max:255|unique:inventaris,kode_barang,'.$id,
            'kategori' => 'required|in:elektronik,furniture,alat_ibadah,alat_kebersihan,lainnya',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string|max:50',
            'kondisi' => 'required|in:baik,rusak_ringan,rusak_berat',
            'tanggal_perolehan' => 'required|date',
            'harga_perolehan' => 'nullable|numeric|min:0',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $inventaris = Inventaris::findOrFail($id);
        $inventaris->update([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $request->kode_barang,
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'kondisi' => $request->kondisi,
            'tanggal_perolehan' => $request->tanggal_perolehan,
            'harga_perolehan' => $request->harga_perolehan,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil diupdate');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();
        
        return redirect()->route('inventaris.index')->with('success', 'Data inventaris berhasil dihapus');
    }
}
