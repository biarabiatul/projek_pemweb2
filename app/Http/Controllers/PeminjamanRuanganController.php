<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        $peminjaman_ruangan = PeminjamanRuangan::all();
        return view('peminjamanSaya', compact('peminjaman_ruangan'));
    }

    public function create()
    {
        return view('pengguna/formPinjamRuangan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah_peserta' => 'required|integer',
            'namaKegiatan' => 'required|string|max:255',
            'waktuMulai' => 'required|date',
            'waktuSelesai' => 'required|date|after_or_equal:waktuMulai',
        ]);

        PeminjamanRuangan::create([
            'nama_peminjam' => $request->nama,
            'jumlah_peserta' => $request->jumlah_peserta,
            'nama_kegiatan' => $request->namaKegiatan,
            'waktu_mulai' => $request->waktuMulai,
            'waktu_selesai' => $request->waktuSelesai,
        ]);

        return redirect()->route('peminjaman.create')->with('success', 'Peminjaman berhasil diajukan!');
    }

    public function show($id)
    {
        $peminjaman_ruangan = PeminjamanRuangan::find($id);
        return view('peminjaman_ruangan.show', compact('peminjaman_ruangan'));
    }

    public function edit($id)
    {
        $peminjaman_ruangan = PeminjamanRuangan::find($id);
        return view('peminjaman_ruangan.edit', compact('peminjaman_ruangan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Perbarui data peminjaman ruangan
        PeminjamanRuangan::find($id)->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman_ruangan.index')
                        ->with('success', 'Peminjaman ruangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data peminjaman ruangan
        PeminjamanRuangan::find($id)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman_ruangan.index')
                        ->with('success', 'Peminjaman ruangan berhasil dihapus.');
    }
        
}
