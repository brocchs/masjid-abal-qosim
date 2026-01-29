<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use App\Models\Muzakki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZakatController extends Controller
{
    public function index()
    {
        $zakats = Zakat::orderBy('created_at', 'desc')->paginate(10);
        $totalZakat = Zakat::where('jenis_bayar', 'tunai')->sum('total_bayar');
        $totalJiwa = Zakat::sum('jumlah_jiwa');
        $totalBeras = Zakat::where('jenis_bayar', 'beras')->sum('jumlah_beras');
        
        return view('zakat.index', compact('zakats', 'totalZakat', 'totalJiwa', 'totalBeras'));
    }

    public function create()
    {
        return view('zakat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'no_whatsapp' => 'nullable|string|max:20',
            'jumlah_jiwa' => 'required|integer|min:1',
            'jenis_bayar' => 'required|in:tunai,beras',
            'jumlah_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:0',
            'harga_per_jiwa' => 'required_if:jenis_bayar,tunai|nullable|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'muzakkis' => 'required|array|min:1',
            'muzakkis.*.nama' => 'required|string|max:255',
            'muzakkis.*.hubungan_keluarga' => 'required|string|max:255'
        ]);

        $data = $request->only(['nama_pembayar', 'no_whatsapp', 'jumlah_jiwa', 'jenis_bayar', 'jumlah_beras', 'harga_per_jiwa']);
        $data['tanggal_bayar'] = $request->tanggal_bayar . ' ' . date('H:i:s');
        
        if ($request->jenis_bayar == 'tunai') {
            $data['total_bayar'] = $request->jumlah_jiwa * $request->harga_per_jiwa;
        } else {
            $data['total_bayar'] = 0;
            $data['harga_per_jiwa'] = 0;
        }
        
        $data['user_id'] = Auth::id();

        $zakat = Zakat::create($data);

        // Simpan muzakki
        foreach ($request->muzakkis as $muzakki) {
            Muzakki::create([
                'zakat_id' => $zakat->id,
                'nama' => $muzakki['nama'],
                'hubungan_keluarga' => $muzakki['hubungan_keluarga']
            ]);
        }

        // Kirim pesan WhatsApp
        $phoneNumber = $zakat->no_whatsapp ? '62' . ltrim($zakat->no_whatsapp, '0') : '6285230444463';
        $message = "*Zakat Fitrah Baru*\n\n";
        $message .= "Nama Pembayar: {$zakat->nama_pembayar}\n";
        $message .= "Jumlah Jiwa: {$zakat->jumlah_jiwa}\n\n";
        
        $message .= "*Daftar Muzakki:*\n";
        foreach ($zakat->muzakkis as $index => $muzakki) {
            $message .= ($index + 1) . ". {$muzakki->nama} ({$muzakki->hubungan_keluarga})\n";
        }
        
        $message .= "\nJenis Bayar: " . ucfirst($zakat->jenis_bayar) . "\n";
        
        if ($zakat->jenis_bayar == 'beras') {
            $message .= "Jumlah Beras: {$zakat->jumlah_beras} kg\n";
        } else {
            $message .= "Harga per Jiwa: Rp " . number_format($zakat->harga_per_jiwa, 0, ',', '.') . "\n";
            $message .= "Total Bayar: Rp " . number_format($zakat->total_bayar, 0, ',', '.') . "\n";
        }
        
        $message .= "Tanggal: " . date('d/m/Y H:i', strtotime($zakat->tanggal_bayar));
        
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);

        return redirect()->route('zakat.index')
            ->with('success', 'Data zakat berhasil ditambahkan')
            ->with('whatsapp_url', $whatsappUrl);
    }

    public function edit(Zakat $zakat)
    {
        return view('zakat.edit', compact('zakat'));
    }

    public function update(Request $request, Zakat $zakat)
    {
        $request->validate([
            'nama_pembayar' => 'required|string|max:255',
            'no_whatsapp' => 'nullable|string|max:20',
            'jumlah_jiwa' => 'required|integer|min:1',
            'jenis_bayar' => 'required|in:tunai,beras',
            'jumlah_beras' => 'required_if:jenis_bayar,beras|nullable|numeric|min:0',
            'harga_per_jiwa' => 'required_if:jenis_bayar,tunai|nullable|numeric|min:0',
            'tanggal_bayar' => 'required|date',
            'muzakkis' => 'required|array|min:1',
            'muzakkis.*.nama' => 'required|string|max:255',
            'muzakkis.*.hubungan_keluarga' => 'required|string|max:255'
        ]);

        $data = $request->only(['nama_pembayar', 'no_whatsapp', 'jumlah_jiwa', 'jenis_bayar', 'jumlah_beras', 'harga_per_jiwa']);
        $data['tanggal_bayar'] = $request->tanggal_bayar . ' ' . $zakat->tanggal_bayar->format('H:i:s');
        
        if ($request->jenis_bayar == 'tunai') {
            $data['total_bayar'] = $request->jumlah_jiwa * $request->harga_per_jiwa;
        } else {
            $data['total_bayar'] = 0;
            $data['harga_per_jiwa'] = 0;
        }

        $zakat->update($data);

        $zakat->muzakkis()->delete();
        foreach ($request->muzakkis as $muzakki) {
            Muzakki::create([
                'zakat_id' => $zakat->id,
                'nama' => $muzakki['nama'],
                'hubungan_keluarga' => $muzakki['hubungan_keluarga']
            ]);
        }

        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil diperbarui');
    }

    public function destroy(Zakat $zakat)
    {
        $zakat->delete();
        return redirect()->route('zakat.index')->with('success', 'Data zakat berhasil dihapus');
    }
}